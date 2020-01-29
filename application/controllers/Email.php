<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Email extends CI_Controller
{
    public function send()
    {
        $this->load->library('mailer');
        $email_penerima = $this->input->post('email_penerima');
        $subjek = $this->input->post('subjek');
        $pesan = $this->input->post('pesan');
        $attachment = $_FILES['attachment'];
        $content = $this->load->view('content', array('pesan' => $pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
        $sendmail = array(
            'email_penerima' => $email_penerima,
            'subjek' => $subjek,
            'content' => $content,
            'attachment' => $attachment
        );
        if (empty($attachment['name'])) { // Jika tanpa attachment
            $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
        } else { // Jika dengan attachment
            $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
        }
        echo "<b>" . $send['status'] . "</b><br />";
        echo $send['message'];
        echo "<br /><a href='" . base_url("index.php/email") . "'>Kembali ke Form</a>";
    }

    function kirimEmailRegistrasi()
    {
        $this->load->library('mailer');
        $dataMailer = $this->db->get_where('mail_log', array('token' => $this->session->userdata('token')))->row();
        // print_r($dataMailer);
        // exit;
        $email_penerima = $dataMailer->mail_to;
        $data['nama'] = $dataMailer->nama;
        $data['link'] = $this->session->userdata('token');
        // $subjek = $this->input->post('subjek');
        // $pesan = $this->input->post('pesan');
        // $attachment = $_FILES['attachment'];
        $content = $this->load->view('layout/email', $data, true); // Ambil isi file content.php dan masukan ke variabel $content
        $sendmail = array(
            'email_penerima' => $email_penerima,
            'content' => $content,
            // 'attachment' => $attachment
        );
        // if (empty($attachment['name'])) { // Jika tanpa attachment
        $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
        // } else { // Jika dengan attachment
        //     $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
        // }
        if ($send) {
            $sess = array(
                'status' => 'sukses',
                'message' => 'Proses Pendaftaran Berhasil, Silahkan periksa email untuk verifikasi data',
            );
            $this->session->set_flashdata($sess);
            redirect(base_url('Login'));
        }
    }
}
