<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_not_login();
		check_user();
		$this->load->model('admin/env/Pembayaran_m', 'Pembayaran_m');
		$this->load->model('admin/env/Agenda_m', 'Agenda_m');
		$this->load->model('admin/env/Kontakadmin_m', 'Kontakadmin_m');
	}

	public function index()
	{
		if ($this->fungsi->user_login()->level == 1) {
			redirect('admindashboard');
		}
		$data['tittle'] = "Dashboard";
		$data['env_pembayaran'] = $this->Pembayaran_m->getPembayaran()->row();
		$this->template->load('temp_dashboard', 'user/dashboard/index', $data);
	}

	public function biayadaftarulang()
	{
		$data['tittle'] = "Dashboard";
		$data['data'] = $this->Agenda_m->getAgenda()->row();
		$this->template->load('temp_dashboard', 'user/dashboard/biayadaftarulang', $data);
	}

	public function agenda()
	{
		$data['tittle'] = "Dashboard";
		$data['data'] = $this->Agenda_m->getAgenda()->row();
		$this->template->load('temp_dashboard', 'user/dashboard/agenda', $data);
	}

	public function hubungiadmin()
	{
		$data['tittle'] = "Dashboard";
		$data['data'] = $this->Kontakadmin_m->getKontak()->row();
		$this->template->load('temp_dashboard', 'user/dashboard/hubungiadmin', $data);
	}
}
