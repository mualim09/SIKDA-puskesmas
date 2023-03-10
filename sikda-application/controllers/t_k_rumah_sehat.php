<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'include/xmlelement.php';
class T_k_rumah_sehat extends CI_Controller {
	public function index()
	{
		$this->load->view('t_k_rumah_sehat/v_rumah_sehat');
	}
	
	public function rumahsehatpopup()
	{
		$data['id_caller'] = $this->input->get('id_caller')?$this->input->get('id_caller',TRUE):null;
		$this->load->view('t_k_rumah_sehat/v_rumah_sehat_popup',$data);
	}
	
	public function rumahsehatxml()
	{
		$this->load->model('t_k_rumah_sehat_model');
		
		$limit = $this->input->post('rows')?$this->input->post('rows'):10;
		
		$paramstotal=array(
					'dari'=>$this->input->post('dari'),
					'sampai'=>$this->input->post('sampai'),
					'carinama'=>$this->input->post('carinama')
					);
					
		$total = $this->t_k_rumah_sehat_model->totalrumahsehat($paramstotal);
		
		$total_pages = ($total >0)?ceil($total/$limit):1;
		$page = $this->input->post('page')?$this->input->post('page'):1;
		if ($page > $total_pages) $page=$total_pages;
		$start = $limit*$page - $limit;
		
		$params=array(
					'start'=>$start,
					'limit'=>$limit,
					'sort'=>$this->input->post('asc'),
					'dari'=>$this->input->post('dari'),
					'sampai'=>$this->input->post('sampai'),
					'carinama'=>$this->input->post('carinama')
					);
					
		$result = $this->t_k_rumah_sehat_model->getrumahsehat($params);		
		
		header("Content-type: text/xml");
		echo writeXmlElement::writeXml3('rows', $result['data'], $total,$page,$total_pages);
	}
	
	public function add()
	{
		$this->load->helper('beries_helper');
		$this->load->view('t_k_rumah_sehat/v_rumah_sehat_add');
	}
	
	public function addprocess()
	{	
		if(empty($_FILES)) die('Silahkan Tambahkan File Inspeksi Terlebih Dahulu.');
		$allowed =array('xls','xlsx','CSV');
		$ext = pathinfo($_FILES['filedok']['name'],PATHINFO_EXTENSION);
		if(!in_array($ext, $allowed)) {
		  die('Hanya tipe file.xls, .xlsx, atau CSV yang Diperbolehkan.');
		}else{
			$newFilename = 'rumahsehat/'.date("Ymd_His").$_FILES['filedok']['name'];
			if(move_uploaded_file($_FILES['filedok']['tmp_name'], TMP_PATH . $newFilename)){	
				$this->load->library('form_validation');

				$val = $this->form_validation;
				//$val->set_rules('provinsi', 'Propinsi', 'trim|required|xss_clean');
				//$val->set_rules('kabupaten_kota', 'Kabupaten', 'trim|required|xss_clean');
				//$val->set_rules('kecamatan', 'Kecamatan', 'trim|required|xss_clean');
				$val->set_rules('rt', 'RT', 'trim|required|xss_clean');
				$val->set_rules('rw', 'RW', 'trim|required|xss_clean');
				$val->set_rules('desa_kelurahan', 'Desa', 'trim|required|xss_clean');
				$val->set_rules('nama_kk', 'Nama KK', 'trim|required|xss_clean');
				$val->set_rules('jumlah_jiwa', 'Jumlah Jiwa', 'trim|required|xss_clean');
				$val->set_rules('tanggal_inspeksi', 'Tanggal Inspeksi', 'trim|required|xss_clean');
				$val->set_rules('total_nilai', 'Total Nilai Pemeriksaan', 'trim|required|xss_clean');
				$val->set_rules('pemeriksa', 'Pemeriksa', 'trim|required|xss_clean');
						
				$val->set_message('required', "Silahkan isi field \"%s\"");

				if ($val->run() == FALSE)
				{
					$val->set_error_delimiters('<div style="color:white">', '</div>');
					die(validation_errors());
				}
				else
				{						
					$db = $this->load->database('sikda', TRUE);
					$db->trans_begin();
					$date=explode('/', $this->input->post('tanggal_inspeksi'));					
					$dataexc = array(
						//'KD_PROPINSI' => $val->set_value('provinsi'),
						//'KD_KABUPATEN' => $val->set_value('kabupaten_kota'),
						//'KD_KECAMATAN' => $val->set_value('kecamatan'),
						'KD_PROPINSI' => $this->session->userdata('kd_propinsi'),
						'KD_KABUPATEN' => $this->session->userdata('kd_kabupaten'),
						'KD_KECAMATAN' => $this->session->userdata('kd_kecamatan'),
						'KD_KELURAHAN' => $val->set_value('desa_kelurahan'),
						'NAMA_KK' => $val->set_value('nama_kk'),
						'JUMLAH_JIWA' => $val->set_value('jumlah_jiwa'),
						'TOTAL_NILAI' => $val->set_value('total_nilai'),
						'PEMERIKSA' => $val->set_value('pemeriksa'),
						'TANGGAL_INSPEKSI' => date("Y-m-d", mktime(0,0,0, $date[1], $date[0], $date[2])),
						'RT' => $val->set_value('rt'),
						'RW' => $val->set_value('rw'),
						'DOKUMEN_PEMERIKSAAN' => $_FILES['filedok']['name']?date("Ymd_His").$_FILES['filedok']['name']:'',
						'ninput_oleh' => $this->session->userdata('nusername'),
						'ninput_tgl' => date('Y-m-d H:i:s')
					);
					
					$db->insert('t_k_rumahsehat', $dataexc);
					
					if ($db->trans_status() === FALSE)
					{
						$db->trans_rollback();
						die('Maaf Proses Insert Data Gagal');
					}
					else
					{
						$db->trans_commit();
						die('OK');
					}
				}
			}
		}
	}
	
	public function editprocess()
	{		
		if(!empty($_FILES)) {
			$allowed =array('xls','xlsx','CSV');
			$ext = pathinfo($_FILES['filedok']['name'],PATHINFO_EXTENSION);
			if(!in_array($ext, $allowed))die('Hanya tipe file.xls, .xlsx, atau CSV yang Diperbolehkan.');
			$newFilename = 'rumahsehat/'.date("Ymd_His").$_FILES['filedok']['name'];
			move_uploaded_file($_FILES['filedok']['tmp_name'], TMP_PATH . $newFilename);
		}				
		$this->load->library('form_validation');
		$val = $this->form_validation;
		//$val->set_rules('provinsi', 'Propinsi', 'trim|required|xss_clean');
		//$val->set_rules('kabupaten_kota', 'Kabupaten', 'trim|required|xss_clean');
		//$val->set_rules('kecamatan', 'Kecamatan', 'trim|required|xss_clean');
		$val->set_rules('desa_kelurahan', 'Desa', 'trim|required|xss_clean');
		$val->set_rules('nama_kk', 'Nama KK', 'trim|required|xss_clean');
		$val->set_rules('rt', 'RT', 'trim|required|xss_clean');
		$val->set_rules('rw', 'RW', 'trim|required|xss_clean');
		$val->set_rules('jumlah_jiwa', 'Jumlah Jiwa', 'trim|required|xss_clean');
		$val->set_rules('tanggal_inspeksi', 'Tanggal Inspeksi', 'trim|required|xss_clean');
		$val->set_rules('total_nilai', 'Total Nilai Pemeriksaan', 'trim|required|xss_clean');
		$val->set_rules('pemeriksa', 'Pemeriksa', 'trim|required|xss_clean');
				
		$val->set_message('required', "Silahkan isi field \"%s\"");

		if ($val->run() == FALSE)
		{
			$val->set_error_delimiters('<div style="color:white">', '</div>');
			die(validation_errors());
		}
		else
		{						
			$db = $this->load->database('sikda', TRUE);
			$db->trans_begin();
			$date=explode('/', $this->input->post('tanggal_inspeksi'));					
			$dataexc = array(
				//'KD_PROPINSI' => $val->set_value('provinsi'),
				//'KD_KABUPATEN' => $val->set_value('kabupaten_kota'),
				//'KD_KECAMATAN' => $val->set_value('kecamatan'),
				'KD_KELURAHAN' => $val->set_value('desa_kelurahan'),
				'NAMA_KK' => $val->set_value('nama_kk'),
				'JUMLAH_JIWA' => $val->set_value('jumlah_jiwa'),
				'TOTAL_NILAI' => $val->set_value('total_nilai'),
				'PEMERIKSA' => $val->set_value('pemeriksa'),
				'TANGGAL_INSPEKSI' => date("Y-m-d", mktime(0,0,0, $date[1], $date[0], $date[2])),
				'RT' => $val->set_value('rt'),
				'RW' => $val->set_value('rw'),
				'DOKUMEN_PEMERIKSAAN' => !empty($_FILES['filedok']['name'])?date("Ymd_His").$_FILES['filedok']['name']:$this->input->post('fileold',true),
				'nupdate_oleh' => $this->session->userdata('nusername'),
				'nupdate_tgl' => date('Y-m-d H:i:s')
			);
			
			$id=$this->input->post('ID',true);
			
			$db->where('ID',$id);
			$db->update('t_k_rumahsehat', $dataexc);
			
			if ($db->trans_status() === FALSE)
			{
				$db->trans_rollback();
				die('Maaf Proses Insert Data Gagal');
			}
			else
			{
				$db->trans_commit();
				die('OK');
			}
		}			
	}
	
	public function edit()
	{
		$this->load->helper('beries_helper');
		$id=$this->input->get('id')?$this->input->get('id',TRUE):null;
		$db = $this->load->database('sikda', TRUE);
		$val = $db->query("select t.*,p.PROVINSI,k.KABUPATEN,kc.KECAMATAN,kl.KELURAHAN,DATE_FORMAT(TANGGAL_INSPEKSI, '%d/%m/%Y') as TANGGAL 
						from t_k_rumahsehat t left join mst_provinsi p on p.KD_PROVINSI=t.KD_PROPINSI
						join mst_kabupaten k on k.KD_KABUPATEN=t.KD_KABUPATEN
						join mst_kecamatan kc on kc.KD_KECAMATAN=t.KD_KECAMATAN
						join mst_kelurahan kl on kl.KD_KELURAHAN=t.KD_KELURAHAN
						where ID = '".$id."'")->row();
		$data['data']=$val;		
		$this->load->view('t_k_rumah_sehat/v_rumah_sehat_edit',$data);
	}
	
	public function delete()
	{
		$id=$this->input->post('id')?$this->input->post('id',TRUE):null;
		$db = $this->load->database('sikda', TRUE);
		if($db->query("delete from t_k_rumahsehat where ID = '".$id."'")){
			die(json_encode('OK'));
		}else{
			die(json_encode('FAIL'));
		}
	}
	
	public function detail()
	{
		$id=$this->input->get('id')?$this->input->get('id',TRUE):null;
		$db = $this->load->database('sikda', TRUE);
		$val = $db->query("select t.*,p.PROVINSI,k.KABUPATEN,kc.KECAMATAN,kl.KELURAHAN,DATE_FORMAT(TANGGAL_INSPEKSI, '%d/%m/%Y') as TANGGAL 
						from t_k_rumahsehat t left join mst_provinsi p on p.KD_PROVINSI=t.KD_PROPINSI
						join mst_kabupaten k on k.KD_KABUPATEN=t.KD_KABUPATEN
						join mst_kecamatan kc on kc.KD_KECAMATAN=t.KD_KECAMATAN
						join mst_kelurahan kl on kl.KD_KELURAHAN=t.KD_KELURAHAN
						where ID = '".$id."'")->row();
		$data['data']=$val;
		$this->load->view('t_k_rumah_sehat/v_rumah_sehat_detail',$data);
	}
	
}

/* End of file c_rumah_sehat.php */
/* Location: ./application/controllers/c_rumah_sehat.php */