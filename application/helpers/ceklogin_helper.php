<?php

function check_already_login()
{
    //apakah sudah login?
    //letakkan di controller yang tidak perlu login.
    $ci = &get_instance();
    $user_session = $ci->session->userdata('user_id');
    if ($user_session) {
        redirect('dashboard');
    }
}

function check_not_login()
{
    //apakah belum login?
    //letakkan di controller yang harus login terlebih dahulu.
    $ci = &get_instance();
    $user_session = $ci->session->userdata('user_id');
    if (!$user_session) {
        redirect('auth');
    }
}

/*
| -------------------------------------------------------------------
|  Check Role
| -------------------------------------------------------------------
| Prototype:
| Silahkan tambahkan check role sesuai dengan level dari user yang
| login. Kemudian letakkan fungsi pada construct pada setiap
| controller.
*/
function check_admin()
{
    //hanya admin yang bisa akses controller
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->level != 1) {
        redirect('dashboard');
    }
}

function check_user()
{
    //hanya user yang bisa akses controller
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->level != 2) {
        redirect('admindashboard');
    }
}
