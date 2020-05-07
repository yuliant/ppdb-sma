<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Formulir_m extends CI_Model
{
    public function getDataDiri($id = null)
    {
        $this->db->from('data_diri_pribadi');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getDataSekolah($id = null)
    {
        $this->db->from('data_diri_sekolah');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getDataOrtu($id = null)
    {
        $this->db->from('data_ortu');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getBerkas($id = null)
    {
        $this->db->from('data_berkas');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getAllFormulir($id = null, $tahun = null)
    {
        $this->db->select('data_diri_pribadi.*, data_diri_sekolah.*, data_ortu.*, data_berkas.*');
        $this->db->from('data_diri_pribadi');
        $this->db->join('data_diri_sekolah', 'data_diri_sekolah.id_user = data_diri_pribadi.id_user', 'left');
        $this->db->join('data_ortu', 'data_ortu.id_user = data_diri_pribadi.id_user', 'left');
        $this->db->join('data_berkas', 'data_berkas.id_user = data_diri_pribadi.id_user', 'left');
        if ($id != null) {
            $this->db->where('data_diri_pribadi.id_user', $id);
        }
        if ($tahun != null) {
            $this->db->where("DATE_FORMAT(data_berkas.berkas_created,'%Y')", $tahun);
        }
        $query = $this->db->get();
        return $query;
    }

    public function addDataDiri($post, $id, $username, $nama, $telp)
    {
        $this->db->set('id_user', $id);
        $this->db->set('username', $username);
        $this->db->set('nama', strtoupper($nama));
        $this->db->set('tempat_lahir', strtoupper(htmlspecialchars($post['tempat_lahir'], true)));
        $this->db->set('tanggal_lahir', htmlspecialchars($post['tgl_lahir'], true));
        $this->db->set('agama', htmlspecialchars($post['agama'], true));
        $this->db->set('kelamin', htmlspecialchars($post['kelamin'], true));
        $this->db->set('alamat', strtoupper(htmlspecialchars($post['alamat'], true)));
        $this->db->set('telp', $telp);
        $this->db->insert('data_diri_pribadi');
    }

    public function addDataSekolah($post, $id)
    {
        $this->db->set('id_user', $id);
        $this->db->set('asal_sekolah', strtoupper(htmlspecialchars($post['asal_sekolah'], true)));
        $this->db->set('nisn', htmlspecialchars($post['nisn'], true));
        $this->db->set('tahun_lulus', htmlspecialchars($post['thn_lulus'], true));
        $this->db->insert('data_diri_sekolah');
    }

    public function addDataOrtu($post, $id)
    {
        $this->db->set('id_user', $id);
        $this->db->set('nama_ortu', strtoupper(htmlspecialchars($post['nama_ortu'], true)));
        $this->db->set('pekerjaan', strtoupper(htmlspecialchars($post['pekerjaan'], true)));
        $this->db->set('alamat_ortu', strtoupper(htmlspecialchars($post['alamat'], true)));
        $this->db->set('telp_ortu', htmlspecialchars($post['telp_ortu'], true));
        $this->db->insert('data_ortu');
    }

    public function addDataBerkas($post, $id, $fotoijasah, $fotoshun)
    {
        $this->db->set('id_user', $id);
        $this->db->set('nilai_indo', htmlspecialchars($post['nilai_indo'], true));
        $this->db->set('nilai_ing', htmlspecialchars($post['nilai_ing'], true));
        $this->db->set('matematika', htmlspecialchars($post['matematika'], true));
        $this->db->set('ipa', htmlspecialchars($post['ipa'], true));
        $this->db->set('foto_ijasah_smp', $fotoijasah);
        $this->db->set('foto_shun', $fotoshun);
        $this->db->set('berkas_created', gmdate("Y-m-d H:i:s", time() + 3600 * 7));
        $this->db->insert('data_berkas');
    }

    public function addDataQrcode($id, $token)
    {
        $this->db->set('id_user', $id);
        $this->db->set('token', $token);
        $this->db->insert('data_qrcode');
    }

    public function editDataDiri($post, $id)
    {
        $this->db->set('tempat_lahir', strtoupper(htmlspecialchars($post['tempat_lahir'], true)));
        $this->db->set('tanggal_lahir', htmlspecialchars($post['tgl_lahir'], true));
        $this->db->set('agama', htmlspecialchars($post['agama'], true));
        $this->db->set('kelamin', htmlspecialchars($post['kelamin'], true));
        $this->db->set('alamat', strtoupper(htmlspecialchars($post['alamat'], true)));
        $this->db->where('id_user', $id);
        $this->db->update('data_diri_pribadi');
    }

    public function editDataSekolah($post, $id)
    {
        $this->db->set('asal_sekolah', strtoupper(htmlspecialchars($post['asal_sekolah'], true)));
        $this->db->set('nisn', htmlspecialchars($post['nisn'], true));
        $this->db->set('tahun_lulus', htmlspecialchars($post['thn_lulus'], true));
        $this->db->where('id_user', $id);
        $this->db->update('data_diri_sekolah');
    }

    public function editDataOrtu($post, $id)
    {
        $this->db->set('nama_ortu', strtoupper(htmlspecialchars($post['nama_ortu'], true)));
        $this->db->set('pekerjaan', strtoupper(htmlspecialchars($post['pekerjaan'], true)));
        $this->db->set('alamat_ortu', strtoupper(htmlspecialchars($post['alamat'], true)));
        $this->db->set('telp_ortu', htmlspecialchars($post['telp_ortu'], true));
        $this->db->where('id_user', $id);
        $this->db->update('data_ortu');
    }

    public function editDataBerkas($post, $id, $fotoijasah = null, $fotoshun = null)
    {
        $this->db->set('nilai_indo', htmlspecialchars($post['nilai_indo'], true));
        $this->db->set('nilai_ing', htmlspecialchars($post['nilai_ing'], true));
        $this->db->set('matematika', htmlspecialchars($post['matematika'], true));
        $this->db->set('ipa', htmlspecialchars($post['ipa'], true));
        if ($fotoijasah != null) {
            $this->db->set('foto_ijasah_smp', $fotoijasah);
        }
        if ($fotoshun != null) {
            $this->db->set('foto_shun', $fotoshun);
        }
        $this->db->set('berkas_created', gmdate("Y-m-d H:i:s", time() + 3600 * 7));
        $this->db->where('id_user', $id);
        $this->db->update('data_berkas');
    }
}

/* End of file Formulir_m.php */
