<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends CI_Controller {
       function __construct()
       {
          parent::__construct();
          $this->load->model('Export_m', 'export');
          $this->load->helper('url');
      }

      public function exportAllKaryawan()
      {
        $data_proccess = $this->export->selectAllKaryawan()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B1', 'Tanggal Backup :')
        ->setCellValue('A3', 'No')
        ->setCellValue('B3', 'NIK')
        ->setCellValue('C3', 'Nama')
        ->setCellValue('D3', 'Band Posisi')
        ->setCellValue('E3', 'Jabatan')
        ->setCellValue('F3', 'Nomor Internet')
        ->setCellValue('G3', 'Nomor Telephone')
        ->setCellValue('H3', 'Alat Produksi')
        ->setCellValue('I3', 'NIK di Data Pelanggan')
        ->setCellValue('J3', 'Segmen/Paket')
        ->setCellValue('K3', 'Telp Rumah')
        ->setCellValue('L3', 'Non FO')
        ->setCellValue('M3', 'FO')
        ->setCellValue('N3', 'Kuota')
        ->setCellValue('O3', 'Usee TV')
        ->setCellValue('P3', 'Realisasi Pagu')
        ->setCellValue('Q3', 'Lokasi Kerja')
        ->setCellValue('R3', 'Lokasi Fasteljab');

        $backup = date("d-F-Y");
        $kolom_backup = 1;
        $kolom = 4;
        $nomor = 1;

        if (!$data_proccess) {
                #kosong ...
        } else {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $kolom_backup, $backup);
        }

        foreach($data_proccess as $p) {

         $spreadsheet->setActiveSheetIndex(0)
         ->setCellValue('A' . $kolom, $nomor)
         ->setCellValue('B' . $kolom, $p->nik)
         ->setCellValue('C' . $kolom, $p->nama)
         ->setCellValue('D' . $kolom, $p->posisi)
         ->setCellValue('E' . $kolom, $p->jabatan)
         ->setCellValue('F' . $kolom, $p->no_internet)
         ->setCellValue('G' . $kolom, $p->no_telp)
         ->setCellValue('H' . $kolom, $p->alpro)
         ->setCellValue('I' . $kolom, $p->isiska)
         ->setCellValue('J' . $kolom, $p->segmen)
         ->setCellValue('K' . $kolom, $p->pagu_telp)
         ->setCellValue('L' . $kolom, $p->non_fo)
         ->setCellValue('M' . $kolom, $p->fo)
         ->setCellValue('N' . $kolom, $p->kuota)
         ->setCellValue('O' . $kolom, $p->usee_tv)
         ->setCellValue('P' . $kolom, $p->status)
         ->setCellValue('Q' . $kolom, $p->lok_kerja)
         ->setCellValue('R' . $kolom, $p->lok_fasteljab);

         $kolom++;
         $nomor++;

     }

     $writer = new Xlsx($spreadsheet);

     header('Content-Type: application/vnd-ms-excel');
     header('Content-Disposition: attachment; filename=Data Karyawan All DIVRE.xls');
     header('Cache-Control: max-age=0');
     header("Pragma: no-cache");
     header("Expires: 0");


     $writer->save('php://output');

    }

      public function exportHrKantorDiv()
      {
        $data_proccess = $this->export->selectHrKantorDiv()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B1', 'Tanggal Backup :')
        ->setCellValue('A3', 'No')
        ->setCellValue('B3', 'NIK')
        ->setCellValue('C3', 'Nama')
        ->setCellValue('D3', 'Band Posisi')
        ->setCellValue('E3', 'Jabatan')
        ->setCellValue('F3', 'Nomor Internet')
        ->setCellValue('G3', 'Nomor Telephone')
        ->setCellValue('H3', 'Alat Produksi')
        ->setCellValue('I3', 'NIK di Data Pelanggan')
        ->setCellValue('J3', 'Segmen/Paket')
        ->setCellValue('K3', 'Telp Rumah')
        ->setCellValue('L3', 'Non FO')
        ->setCellValue('M3', 'FO')
        ->setCellValue('N3', 'Kuota')
        ->setCellValue('O3', 'Usee TV')
        ->setCellValue('P3', 'Realisasi Pagu')
        ->setCellValue('Q3', 'Lokasi Kerja')
        ->setCellValue('R3', 'Lokasi Fasteljab');

        $backup = date("d-F-Y");
        $kolom_backup = 1;
        $kolom = 4;
        $nomor = 1;

        if (!$data_proccess) {
                #kosong ...
        } else {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $kolom_backup, $backup);
        }

        foreach($data_proccess as $p) {

         $spreadsheet->setActiveSheetIndex(0)
         ->setCellValue('A' . $kolom, $nomor)
         ->setCellValue('B' . $kolom, $p->nik)
         ->setCellValue('C' . $kolom, $p->nama)
         ->setCellValue('D' . $kolom, $p->posisi)
         ->setCellValue('E' . $kolom, $p->jabatan)
         ->setCellValue('F' . $kolom, $p->no_internet)
         ->setCellValue('G' . $kolom, $p->no_telp)
         ->setCellValue('H' . $kolom, $p->alpro)
         ->setCellValue('I' . $kolom, $p->isiska)
         ->setCellValue('J' . $kolom, $p->segmen)
         ->setCellValue('K' . $kolom, $p->pagu_telp)
         ->setCellValue('L' . $kolom, $p->non_fo)
         ->setCellValue('M' . $kolom, $p->fo)
         ->setCellValue('N' . $kolom, $p->kuota)
         ->setCellValue('O' . $kolom, $p->usee_tv)
         ->setCellValue('P' . $kolom, $p->status)
         ->setCellValue('Q' . $kolom, $p->lok_kerja)
         ->setCellValue('R' . $kolom, $p->lok_fasteljab);

         $kolom++;
         $nomor++;

     }

     $writer = new Xlsx($spreadsheet);

     header('Content-Type: application/vnd-ms-excel');
     header('Content-Disposition: attachment; filename=Data Karyawan Kantor DIV IV.xls');
     header('Cache-Control: max-age=0');
     header("Pragma: no-cache");
     header("Expires: 0");


     $writer->save('php://output');

    }

    public function exportHrNonTreg()
      {
        $data_proccess = $this->export->selectHrNonTreg()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B1', 'Tanggal Backup :')
        ->setCellValue('A3', 'No')
        ->setCellValue('B3', 'NIK')
        ->setCellValue('C3', 'Nama')
        ->setCellValue('D3', 'Band Posisi')
        ->setCellValue('E3', 'Jabatan')
        ->setCellValue('F3', 'Nomor Internet')
        ->setCellValue('G3', 'Nomor Telephone')
        ->setCellValue('H3', 'Alat Produksi')
        ->setCellValue('I3', 'NIK di Data Pelanggan')
        ->setCellValue('J3', 'Segmen/Paket')
        ->setCellValue('K3', 'Telp Rumah')
        ->setCellValue('L3', 'Non FO')
        ->setCellValue('M3', 'FO')
        ->setCellValue('N3', 'Kuota')
        ->setCellValue('O3', 'Usee TV')
        ->setCellValue('P3', 'Realisasi Pagu')
        ->setCellValue('Q3', 'Lokasi Kerja')
        ->setCellValue('R3', 'Lokasi Fasteljab');

        $backup = date("d-F-Y");
        $kolom_backup = 1;
        $kolom = 4;
        $nomor = 1;

        if (!$data_proccess) {
                #kosong ...
        } else {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $kolom_backup, $backup);
        }

        foreach($data_proccess as $p) {

         $spreadsheet->setActiveSheetIndex(0)
         ->setCellValue('A' . $kolom, $nomor)
         ->setCellValue('B' . $kolom, $p->nik)
         ->setCellValue('C' . $kolom, $p->nama)
         ->setCellValue('D' . $kolom, $p->posisi)
         ->setCellValue('E' . $kolom, $p->jabatan)
         ->setCellValue('F' . $kolom, $p->no_internet)
         ->setCellValue('G' . $kolom, $p->no_telp)
         ->setCellValue('H' . $kolom, $p->alpro)
         ->setCellValue('I' . $kolom, $p->isiska)
         ->setCellValue('J' . $kolom, $p->segmen)
         ->setCellValue('K' . $kolom, $p->pagu_telp)
         ->setCellValue('L' . $kolom, $p->non_fo)
         ->setCellValue('M' . $kolom, $p->fo)
         ->setCellValue('N' . $kolom, $p->kuota)
         ->setCellValue('O' . $kolom, $p->usee_tv)
         ->setCellValue('P' . $kolom, $p->status)
         ->setCellValue('Q' . $kolom, $p->lok_kerja)
         ->setCellValue('R' . $kolom, $p->lok_fasteljab);

         $kolom++;
         $nomor++;

     }

     $writer = new Xlsx($spreadsheet);

     header('Content-Type: application/vnd-ms-excel');
     header('Content-Disposition: attachment; filename=Data Karyawan Non TREG IV.xls');
     header('Cache-Control: max-age=0');
     header("Pragma: no-cache");
     header("Expires: 0");


     $writer->save('php://output');

    }

    public function exportHrSemarang()
      {
        $data_proccess = $this->export->selectHrSemarang()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B1', 'Tanggal Backup :')
        ->setCellValue('A3', 'No')
        ->setCellValue('B3', 'NIK')
        ->setCellValue('C3', 'Nama')
        ->setCellValue('D3', 'Band Posisi')
        ->setCellValue('E3', 'Jabatan')
        ->setCellValue('F3', 'Nomor Internet')
        ->setCellValue('G3', 'Nomor Telephone')
        ->setCellValue('H3', 'Alat Produksi')
        ->setCellValue('I3', 'NIK di Data Pelanggan')
        ->setCellValue('J3', 'Segmen/Paket')
        ->setCellValue('K3', 'Telp Rumah')
        ->setCellValue('L3', 'Non FO')
        ->setCellValue('M3', 'FO')
        ->setCellValue('N3', 'Kuota')
        ->setCellValue('O3', 'Usee TV')
        ->setCellValue('P3', 'Realisasi Pagu')
        ->setCellValue('Q3', 'Lokasi Kerja')
        ->setCellValue('R3', 'Lokasi Fasteljab');

        $backup = date("d-F-Y");
        $kolom_backup = 1;
        $kolom = 4;
        $nomor = 1;

        if (!$data_proccess) {
                #kosong ...
        } else {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $kolom_backup, $backup);
        }

        foreach($data_proccess as $p) {

         $spreadsheet->setActiveSheetIndex(0)
         ->setCellValue('A' . $kolom, $nomor)
         ->setCellValue('B' . $kolom, $p->nik)
         ->setCellValue('C' . $kolom, $p->nama)
         ->setCellValue('D' . $kolom, $p->posisi)
         ->setCellValue('E' . $kolom, $p->jabatan)
         ->setCellValue('F' . $kolom, $p->no_internet)
         ->setCellValue('G' . $kolom, $p->no_telp)
         ->setCellValue('H' . $kolom, $p->alpro)
         ->setCellValue('I' . $kolom, $p->isiska)
         ->setCellValue('J' . $kolom, $p->segmen)
         ->setCellValue('K' . $kolom, $p->pagu_telp)
         ->setCellValue('L' . $kolom, $p->non_fo)
         ->setCellValue('M' . $kolom, $p->fo)
         ->setCellValue('N' . $kolom, $p->kuota)
         ->setCellValue('O' . $kolom, $p->usee_tv)
         ->setCellValue('P' . $kolom, $p->status)
         ->setCellValue('Q' . $kolom, $p->lok_kerja)
         ->setCellValue('R' . $kolom, $p->lok_fasteljab);

         $kolom++;
         $nomor++;

     }

     $writer = new Xlsx($spreadsheet);

     header('Content-Type: application/vnd-ms-excel');
     header('Content-Disposition: attachment; filename=Data Karyawan Witel Semarang.xls');
     header('Cache-Control: max-age=0');
     header("Pragma: no-cache");
     header("Expires: 0");


     $writer->save('php://output');

    }

    public function exportHrSolo()
      {
        $data_proccess = $this->export->selectHrSolo()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B1', 'Tanggal Backup :')
        ->setCellValue('A3', 'No')
        ->setCellValue('B3', 'NIK')
        ->setCellValue('C3', 'Nama')
        ->setCellValue('D3', 'Band Posisi')
        ->setCellValue('E3', 'Jabatan')
        ->setCellValue('F3', 'Nomor Internet')
        ->setCellValue('G3', 'Nomor Telephone')
        ->setCellValue('H3', 'Alat Produksi')
        ->setCellValue('I3', 'NIK di Data Pelanggan')
        ->setCellValue('J3', 'Segmen/Paket')
        ->setCellValue('K3', 'Telp Rumah')
        ->setCellValue('L3', 'Non FO')
        ->setCellValue('M3', 'FO')
        ->setCellValue('N3', 'Kuota')
        ->setCellValue('O3', 'Usee TV')
        ->setCellValue('P3', 'Realisasi Pagu')
        ->setCellValue('Q3', 'Lokasi Kerja')
        ->setCellValue('R3', 'Lokasi Fasteljab');

        $backup = date("d-F-Y");
        $kolom_backup = 1;
        $kolom = 4;
        $nomor = 1;

        if (!$data_proccess) {
                #kosong ...
        } else {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $kolom_backup, $backup);
        }

        foreach($data_proccess as $p) {

         $spreadsheet->setActiveSheetIndex(0)
         ->setCellValue('A' . $kolom, $nomor)
         ->setCellValue('B' . $kolom, $p->nik)
         ->setCellValue('C' . $kolom, $p->nama)
         ->setCellValue('D' . $kolom, $p->posisi)
         ->setCellValue('E' . $kolom, $p->jabatan)
         ->setCellValue('F' . $kolom, $p->no_internet)
         ->setCellValue('G' . $kolom, $p->no_telp)
         ->setCellValue('H' . $kolom, $p->alpro)
         ->setCellValue('I' . $kolom, $p->isiska)
         ->setCellValue('J' . $kolom, $p->segmen)
         ->setCellValue('K' . $kolom, $p->pagu_telp)
         ->setCellValue('L' . $kolom, $p->non_fo)
         ->setCellValue('M' . $kolom, $p->fo)
         ->setCellValue('N' . $kolom, $p->kuota)
         ->setCellValue('O' . $kolom, $p->usee_tv)
         ->setCellValue('P' . $kolom, $p->status)
        ->setCellValue('Q' . $kolom, $p->lok_kerja)
         ->setCellValue('R' . $kolom, $p->lok_fasteljab);

         $kolom++;
         $nomor++;

     }

     $writer = new Xlsx($spreadsheet);

     header('Content-Type: application/vnd-ms-excel');
     header('Content-Disposition: attachment; filename=Data Karyawan Witel Solo.xls');
     header('Cache-Control: max-age=0');
     header("Pragma: no-cache");
     header("Expires: 0");


     $writer->save('php://output');

    }

    public function exportHrYogyakarta()
      {
        $data_proccess = $this->export->selectHrYogyakarta()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B1', 'Tanggal Backup :')
        ->setCellValue('A3', 'No')
        ->setCellValue('B3', 'NIK')
        ->setCellValue('C3', 'Nama')
        ->setCellValue('D3', 'Band Posisi')
        ->setCellValue('E3', 'Jabatan')
        ->setCellValue('F3', 'Nomor Internet')
        ->setCellValue('G3', 'Nomor Telephone')
        ->setCellValue('H3', 'Alat Produksi')
        ->setCellValue('I3', 'NIK di Data Pelanggan')
        ->setCellValue('J3', 'Segmen/Paket')
        ->setCellValue('K3', 'Telp Rumah')
        ->setCellValue('L3', 'Non FO')
        ->setCellValue('M3', 'FO')
        ->setCellValue('N3', 'Kuota')
        ->setCellValue('O3', 'Usee TV')
        ->setCellValue('P3', 'Realisasi Pagu')
        ->setCellValue('Q3', 'Lokasi Kerja')
        ->setCellValue('R3', 'Lokasi Fasteljab');

        $backup = date("d-F-Y");
        $kolom_backup = 1;
        $kolom = 4;
        $nomor = 1;

        if (!$data_proccess) {
                #kosong ...
        } else {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $kolom_backup, $backup);
        }

        foreach($data_proccess as $p) {

         $spreadsheet->setActiveSheetIndex(0)
         ->setCellValue('A' . $kolom, $nomor)
         ->setCellValue('B' . $kolom, $p->nik)
         ->setCellValue('C' . $kolom, $p->nama)
         ->setCellValue('D' . $kolom, $p->posisi)
         ->setCellValue('E' . $kolom, $p->jabatan)
         ->setCellValue('F' . $kolom, $p->no_internet)
         ->setCellValue('G' . $kolom, $p->no_telp)
         ->setCellValue('H' . $kolom, $p->alpro)
         ->setCellValue('I' . $kolom, $p->isiska)
         ->setCellValue('J' . $kolom, $p->segmen)
         ->setCellValue('K' . $kolom, $p->pagu_telp)
         ->setCellValue('L' . $kolom, $p->non_fo)
         ->setCellValue('M' . $kolom, $p->fo)
         ->setCellValue('N' . $kolom, $p->kuota)
         ->setCellValue('O' . $kolom, $p->usee_tv)
         ->setCellValue('P' . $kolom, $p->status)
         ->setCellValue('Q' . $kolom, $p->lok_kerja)
         ->setCellValue('R' . $kolom, $p->lok_fasteljab);

         $kolom++;
         $nomor++;

     }

     $writer = new Xlsx($spreadsheet);

     header('Content-Type: application/vnd-ms-excel');
     header('Content-Disposition: attachment; filename=Data Karyawan Witel Yogyakarta.xls');
     header('Cache-Control: max-age=0');
     header("Pragma: no-cache");
     header("Expires: 0");


     $writer->save('php://output');

    }

    public function exportHrMagelang()
      {
        $data_proccess = $this->export->selectHrMagelang()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B1', 'Tanggal Backup :')
        ->setCellValue('A3', 'No')
        ->setCellValue('B3', 'NIK')
        ->setCellValue('C3', 'Nama')
        ->setCellValue('D3', 'Band Posisi')
        ->setCellValue('E3', 'Jabatan')
        ->setCellValue('F3', 'Nomor Internet')
        ->setCellValue('G3', 'Nomor Telephone')
        ->setCellValue('H3', 'Alat Produksi')
        ->setCellValue('I3', 'NIK di Data Pelanggan')
        ->setCellValue('J3', 'Segmen/Paket')
        ->setCellValue('K3', 'Telp Rumah')
        ->setCellValue('L3', 'Non FO')
        ->setCellValue('M3', 'FO')
        ->setCellValue('N3', 'Kuota')
        ->setCellValue('O3', 'Usee TV')
        ->setCellValue('P3', 'Realisasi Pagu')
        ->setCellValue('Q3', 'Lokasi Kerja')
        ->setCellValue('R3', 'Lokasi Fasteljab');

        $backup = date("d-F-Y");
        $kolom_backup = 1;
        $kolom = 4;
        $nomor = 1;

        if (!$data_proccess) {
                #kosong ...
        } else {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $kolom_backup, $backup);
        }

        foreach($data_proccess as $p) {

         $spreadsheet->setActiveSheetIndex(0)
         ->setCellValue('A' . $kolom, $nomor)
         ->setCellValue('B' . $kolom, $p->nik)
         ->setCellValue('C' . $kolom, $p->nama)
         ->setCellValue('D' . $kolom, $p->posisi)
         ->setCellValue('E' . $kolom, $p->jabatan)
         ->setCellValue('F' . $kolom, $p->no_internet)
         ->setCellValue('G' . $kolom, $p->no_telp)
         ->setCellValue('H' . $kolom, $p->alpro)
         ->setCellValue('I' . $kolom, $p->isiska)
         ->setCellValue('J' . $kolom, $p->segmen)
         ->setCellValue('K' . $kolom, $p->pagu_telp)
         ->setCellValue('L' . $kolom, $p->non_fo)
         ->setCellValue('M' . $kolom, $p->fo)
         ->setCellValue('N' . $kolom, $p->kuota)
         ->setCellValue('O' . $kolom, $p->usee_tv)
         ->setCellValue('P' . $kolom, $p->status)
         ->setCellValue('Q' . $kolom, $p->lok_kerja)
         ->setCellValue('R' . $kolom, $p->lok_fasteljab);

         $kolom++;
         $nomor++;

     }

     $writer = new Xlsx($spreadsheet);

     header('Content-Type: application/vnd-ms-excel');
     header('Content-Disposition: attachment; filename=Data Karyawan Witel Magelang.xls');
     header('Cache-Control: max-age=0');
     header("Pragma: no-cache");
     header("Expires: 0");


     $writer->save('php://output');

    }

    public function exportHrPekalongan()
      {
        $data_proccess = $this->export->selectHrPekalongan()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B1', 'Tanggal Backup :')
        ->setCellValue('A3', 'No')
        ->setCellValue('B3', 'NIK')
        ->setCellValue('C3', 'Nama')
        ->setCellValue('D3', 'Band Posisi')
        ->setCellValue('E3', 'Jabatan')
        ->setCellValue('F3', 'Nomor Internet')
        ->setCellValue('G3', 'Nomor Telephone')
        ->setCellValue('H3', 'Alat Produksi')
        ->setCellValue('I3', 'NIK di Data Pelanggan')
        ->setCellValue('J3', 'Segmen/Paket')
        ->setCellValue('K3', 'Telp Rumah')
        ->setCellValue('L3', 'Non FO')
        ->setCellValue('M3', 'FO')
        ->setCellValue('N3', 'Kuota')
        ->setCellValue('O3', 'Usee TV')
        ->setCellValue('P3', 'Realisasi Pagu')
        ->setCellValue('Q3', 'Lokasi Kerja')
        ->setCellValue('R3', 'Lokasi Fasteljab');

        $backup = date("d-F-Y");
        $kolom_backup = 1;
        $kolom = 4;
        $nomor = 1;

        if (!$data_proccess) {
                #kosong ...
        } else {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $kolom_backup, $backup);
        }

        foreach($data_proccess as $p) {

         $spreadsheet->setActiveSheetIndex(0)
         ->setCellValue('A' . $kolom, $nomor)
         ->setCellValue('B' . $kolom, $p->nik)
         ->setCellValue('C' . $kolom, $p->nama)
         ->setCellValue('D' . $kolom, $p->posisi)
         ->setCellValue('E' . $kolom, $p->jabatan)
         ->setCellValue('F' . $kolom, $p->no_internet)
         ->setCellValue('G' . $kolom, $p->no_telp)
         ->setCellValue('H' . $kolom, $p->alpro)
         ->setCellValue('I' . $kolom, $p->isiska)
         ->setCellValue('J' . $kolom, $p->segmen)
         ->setCellValue('K' . $kolom, $p->pagu_telp)
         ->setCellValue('L' . $kolom, $p->non_fo)
         ->setCellValue('M' . $kolom, $p->fo)
         ->setCellValue('N' . $kolom, $p->kuota)
         ->setCellValue('O' . $kolom, $p->usee_tv)
         ->setCellValue('P' . $kolom, $p->status)
         ->setCellValue('Q' . $kolom, $p->lok_kerja)
         ->setCellValue('R' . $kolom, $p->lok_fasteljab);

         $kolom++;
         $nomor++;

     }

     $writer = new Xlsx($spreadsheet);

     header('Content-Type: application/vnd-ms-excel');
     header('Content-Disposition: attachment; filename=Data Karyawan Witel Pekalongan.xls');
     header('Cache-Control: max-age=0');
     header("Pragma: no-cache");
     header("Expires: 0");


     $writer->save('php://output');

    }

    public function exportHrPurwokerto()
      {
        $data_proccess = $this->export->selectHrPurwokerto()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B1', 'Tanggal Backup :')
        ->setCellValue('A3', 'No')
        ->setCellValue('B3', 'NIK')
        ->setCellValue('C3', 'Nama')
        ->setCellValue('D3', 'Band Posisi')
        ->setCellValue('E3', 'Jabatan')
        ->setCellValue('F3', 'Nomor Internet')
        ->setCellValue('G3', 'Nomor Telephone')
        ->setCellValue('H3', 'Alat Produksi')
        ->setCellValue('I3', 'NIK di Data Pelanggan')
        ->setCellValue('J3', 'Segmen/Paket')
        ->setCellValue('K3', 'Telp Rumah')
        ->setCellValue('L3', 'Non FO')
        ->setCellValue('M3', 'FO')
        ->setCellValue('N3', 'Kuota')
        ->setCellValue('O3', 'Usee TV')
        ->setCellValue('P3', 'Realisasi Pagu')
        ->setCellValue('Q3', 'Lokasi Kerja')
        ->setCellValue('R3', 'Lokasi Fasteljab');

        $backup = date("d-F-Y");
        $kolom_backup = 1;
        $kolom = 4;
        $nomor = 1;

        if (!$data_proccess) {
                #kosong ...
        } else {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $kolom_backup, $backup);
        }

        foreach($data_proccess as $p) {

         $spreadsheet->setActiveSheetIndex(0)
         ->setCellValue('A' . $kolom, $nomor)
         ->setCellValue('B' . $kolom, $p->nik)
         ->setCellValue('C' . $kolom, $p->nama)
         ->setCellValue('D' . $kolom, $p->posisi)
         ->setCellValue('E' . $kolom, $p->jabatan)
         ->setCellValue('F' . $kolom, $p->no_internet)
         ->setCellValue('G' . $kolom, $p->no_telp)
         ->setCellValue('H' . $kolom, $p->alpro)
         ->setCellValue('I' . $kolom, $p->isiska)
         ->setCellValue('J' . $kolom, $p->segmen)
         ->setCellValue('K' . $kolom, $p->pagu_telp)
         ->setCellValue('L' . $kolom, $p->non_fo)
         ->setCellValue('M' . $kolom, $p->fo)
         ->setCellValue('N' . $kolom, $p->kuota)
         ->setCellValue('O' . $kolom, $p->usee_tv)
         ->setCellValue('P' . $kolom, $p->status)
        ->setCellValue('Q' . $kolom, $p->lok_kerja)
         ->setCellValue('R' . $kolom, $p->lok_fasteljab);

         $kolom++;
         $nomor++;

     }

     $writer = new Xlsx($spreadsheet);

     header('Content-Type: application/vnd-ms-excel');
     header('Content-Disposition: attachment; filename=Data Karyawan Witel Purwokerto.xls');
     header('Cache-Control: max-age=0');
     header("Pragma: no-cache");
     header("Expires: 0");


     $writer->save('php://output');

    }

    public function exportHrKudus()
      {
        $data_proccess = $this->export->selectHrKudus()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B1', 'Tanggal Backup :')
        ->setCellValue('A3', 'No')
        ->setCellValue('B3', 'NIK')
        ->setCellValue('C3', 'Nama')
        ->setCellValue('D3', 'Band Posisi')
        ->setCellValue('E3', 'Jabatan')
        ->setCellValue('F3', 'Nomor Internet')
        ->setCellValue('G3', 'Nomor Telephone')
        ->setCellValue('H3', 'Alat Produksi')
        ->setCellValue('I3', 'NIK di Data Pelanggan')
        ->setCellValue('J3', 'Segmen/Paket')
        ->setCellValue('K3', 'Telp Rumah')
        ->setCellValue('L3', 'Non FO')
        ->setCellValue('M3', 'FO')
        ->setCellValue('N3', 'Kuota')
        ->setCellValue('O3', 'Usee TV')
        ->setCellValue('P3', 'Realisasi Pagu')
        ->setCellValue('Q3', 'Lokasi Kerja')
        ->setCellValue('R3', 'Lokasi Fasteljab');

        $backup = date("d-F-Y");
        $kolom_backup = 1;
        $kolom = 4;
        $nomor = 1;

        if (!$data_proccess) {
                #kosong ...
        } else {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $kolom_backup, $backup);
        }

        foreach($data_proccess as $p) {

         $spreadsheet->setActiveSheetIndex(0)
         ->setCellValue('A' . $kolom, $nomor)
         ->setCellValue('B' . $kolom, $p->nik)
         ->setCellValue('C' . $kolom, $p->nama)
         ->setCellValue('D' . $kolom, $p->posisi)
         ->setCellValue('E' . $kolom, $p->jabatan)
         ->setCellValue('F' . $kolom, $p->no_internet)
         ->setCellValue('G' . $kolom, $p->no_telp)
         ->setCellValue('H' . $kolom, $p->alpro)
         ->setCellValue('I' . $kolom, $p->isiska)
         ->setCellValue('J' . $kolom, $p->segmen)
         ->setCellValue('K' . $kolom, $p->pagu_telp)
         ->setCellValue('L' . $kolom, $p->non_fo)
         ->setCellValue('M' . $kolom, $p->fo)
         ->setCellValue('N' . $kolom, $p->kuota)
         ->setCellValue('O' . $kolom, $p->usee_tv)
         ->setCellValue('P' . $kolom, $p->status)
         ->setCellValue('Q' . $kolom, $p->lok_kerja)
         ->setCellValue('R' . $kolom, $p->lok_fasteljab);

         $kolom++;
         $nomor++;

     }

     $writer = new Xlsx($spreadsheet);

     header('Content-Type: application/vnd-ms-excel');
     header('Content-Disposition: attachment; filename=Data Karyawan Witel Kudus.xls');
     header('Cache-Control: max-age=0');
     header("Pragma: no-cache");
     header("Expires: 0");


     $writer->save('php://output');

    }

    public function exportCcNonTreg()
      {
        $data_proccess = $this->export->selectCcNonTreg()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B1', 'Tanggal Backup :')
        ->setCellValue('A3', 'No')
        ->setCellValue('B3', 'NIK')
        ->setCellValue('C3', 'Nama')
        ->setCellValue('D3', 'Band Posisi')
        ->setCellValue('E3', 'Jabatan')
        ->setCellValue('F3', 'Nomor Internet')
        ->setCellValue('G3', 'Nomor Telephone')
        ->setCellValue('H3', 'Alat Produksi')
        ->setCellValue('I3', 'NIK di Data Pelanggan')
        ->setCellValue('J3', 'Segmen/Paket')
        ->setCellValue('K3', 'Telp Rumah')
        ->setCellValue('L3', 'Non FO')
        ->setCellValue('M3', 'FO')
        ->setCellValue('N3', 'Kuota')
        ->setCellValue('O3', 'Usee TV')
        ->setCellValue('P3', 'Realisasi Pagu')
        ->setCellValue('Q3', 'Lokasi Fasteljab')
        ->setCellValue('R3', 'Lokasi Kerja');

        $backup = date("d-F-Y");
        $kolom_backup = 1;
        $kolom = 4;
        $nomor = 1;

        if (!$data_proccess) {
                #kosong ...
        } else {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $kolom_backup, $backup);
        }

        foreach($data_proccess as $p) {

         $spreadsheet->setActiveSheetIndex(0)
         ->setCellValue('A' . $kolom, $nomor)
         ->setCellValue('B' . $kolom, $p->nik)
         ->setCellValue('C' . $kolom, $p->nama)
         ->setCellValue('D' . $kolom, $p->posisi)
         ->setCellValue('E' . $kolom, $p->jabatan)
         ->setCellValue('F' . $kolom, $p->no_internet)
         ->setCellValue('G' . $kolom, $p->no_telp)
         ->setCellValue('H' . $kolom, $p->alpro)
         ->setCellValue('I' . $kolom, $p->isiska)
         ->setCellValue('J' . $kolom, $p->segmen)
         ->setCellValue('K' . $kolom, $p->pagu_telp)
         ->setCellValue('L' . $kolom, $p->non_fo)
         ->setCellValue('M' . $kolom, $p->fo)
         ->setCellValue('N' . $kolom, $p->kuota)
         ->setCellValue('O' . $kolom, $p->usee_tv)
         ->setCellValue('P' . $kolom, $p->status)
         ->setCellValue('Q' . $kolom, $p->lok_fasteljab)
         ->setCellValue('R' . $kolom, $p->lok_kerja);

         $kolom++;
         $nomor++;

     }

     $writer = new Xlsx($spreadsheet);

     header('Content-Type: application/vnd-ms-excel');
     header('Content-Disposition: attachment; filename=Data Fasteljab Witel Non TREG IV.xls');
     header('Cache-Control: max-age=0');
     header("Pragma: no-cache");
     header("Expires: 0");


     $writer->save('php://output');

    }

    public function exportCcSemarang()
      {
        $data_proccess = $this->export->selectCcSemarang()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B1', 'Tanggal Backup :')
        ->setCellValue('A3', 'No')
        ->setCellValue('B3', 'NIK')
        ->setCellValue('C3', 'Nama')
        ->setCellValue('D3', 'Band Posisi')
        ->setCellValue('E3', 'Jabatan')
        ->setCellValue('F3', 'Nomor Internet')
        ->setCellValue('G3', 'Nomor Telephone')
        ->setCellValue('H3', 'Alat Produksi')
        ->setCellValue('I3', 'NIK di Data Pelanggan')
        ->setCellValue('J3', 'Segmen/Paket')
        ->setCellValue('K3', 'Telp Rumah')
        ->setCellValue('L3', 'Non FO')
        ->setCellValue('M3', 'FO')
        ->setCellValue('N3', 'Kuota')
        ->setCellValue('O3', 'Usee TV')
        ->setCellValue('P3', 'Realisasi Pagu')
        ->setCellValue('Q3', 'Lokasi Fasteljab')
        ->setCellValue('R3', 'Lokasi Kerja');

        $backup = date("d-F-Y");
        $kolom_backup = 1;
        $kolom = 4;
        $nomor = 1;

        if (!$data_proccess) {
                #kosong ...
        } else {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $kolom_backup, $backup);
        }

        foreach($data_proccess as $p) {

         $spreadsheet->setActiveSheetIndex(0)
         ->setCellValue('A' . $kolom, $nomor)
         ->setCellValue('B' . $kolom, $p->nik)
         ->setCellValue('C' . $kolom, $p->nama)
         ->setCellValue('D' . $kolom, $p->posisi)
         ->setCellValue('E' . $kolom, $p->jabatan)
         ->setCellValue('F' . $kolom, $p->no_internet)
         ->setCellValue('G' . $kolom, $p->no_telp)
         ->setCellValue('H' . $kolom, $p->alpro)
         ->setCellValue('I' . $kolom, $p->isiska)
         ->setCellValue('J' . $kolom, $p->segmen)
         ->setCellValue('K' . $kolom, $p->pagu_telp)
         ->setCellValue('L' . $kolom, $p->non_fo)
         ->setCellValue('M' . $kolom, $p->fo)
         ->setCellValue('N' . $kolom, $p->kuota)
         ->setCellValue('O' . $kolom, $p->usee_tv)
         ->setCellValue('P' . $kolom, $p->status)
         ->setCellValue('Q' . $kolom, $p->lok_fasteljab)
         ->setCellValue('R' . $kolom, $p->lok_kerja);

         $kolom++;
         $nomor++;

     }

     $writer = new Xlsx($spreadsheet);

     header('Content-Type: application/vnd-ms-excel');
     header('Content-Disposition: attachment; filename=Data Fasteljab Witel Semarang.xls');
     header('Cache-Control: max-age=0');
     header("Pragma: no-cache");
     header("Expires: 0");


     $writer->save('php://output');

    }

    public function exportCcSolo()
      {
        $data_proccess = $this->export->selectCcSolo()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B1', 'Tanggal Backup :')
        ->setCellValue('A3', 'No')
        ->setCellValue('B3', 'NIK')
        ->setCellValue('C3', 'Nama')
        ->setCellValue('D3', 'Band Posisi')
        ->setCellValue('E3', 'Jabatan')
        ->setCellValue('F3', 'Nomor Internet')
        ->setCellValue('G3', 'Nomor Telephone')
        ->setCellValue('H3', 'Alat Produksi')
        ->setCellValue('I3', 'NIK di Data Pelanggan')
        ->setCellValue('J3', 'Segmen/Paket')
        ->setCellValue('K3', 'Telp Rumah')
        ->setCellValue('L3', 'Non FO')
        ->setCellValue('M3', 'FO')
        ->setCellValue('N3', 'Kuota')
        ->setCellValue('O3', 'Usee TV')
        ->setCellValue('P3', 'Realisasi Pagu')
        ->setCellValue('Q3', 'Lokasi Fasteljab')
        ->setCellValue('R3', 'Lokasi Kerja');

        $backup = date("d-F-Y");
        $kolom_backup = 1;
        $kolom = 4;
        $nomor = 1;

        if (!$data_proccess) {
                #kosong ...
        } else {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $kolom_backup, $backup);
        }

        foreach($data_proccess as $p) {

         $spreadsheet->setActiveSheetIndex(0)
         ->setCellValue('A' . $kolom, $nomor)
         ->setCellValue('B' . $kolom, $p->nik)
         ->setCellValue('C' . $kolom, $p->nama)
         ->setCellValue('D' . $kolom, $p->posisi)
         ->setCellValue('E' . $kolom, $p->jabatan)
         ->setCellValue('F' . $kolom, $p->no_internet)
         ->setCellValue('G' . $kolom, $p->no_telp)
         ->setCellValue('H' . $kolom, $p->alpro)
         ->setCellValue('I' . $kolom, $p->isiska)
         ->setCellValue('J' . $kolom, $p->segmen)
         ->setCellValue('K' . $kolom, $p->pagu_telp)
         ->setCellValue('L' . $kolom, $p->non_fo)
         ->setCellValue('M' . $kolom, $p->fo)
         ->setCellValue('N' . $kolom, $p->kuota)
         ->setCellValue('O' . $kolom, $p->usee_tv)
         ->setCellValue('P' . $kolom, $p->status)
         ->setCellValue('Q' . $kolom, $p->lok_fasteljab)
         ->setCellValue('R' . $kolom, $p->lok_kerja);

         $kolom++;
         $nomor++;

     }

     $writer = new Xlsx($spreadsheet);

     header('Content-Type: application/vnd-ms-excel');
     header('Content-Disposition: attachment; filename=Data Fasteljab Witel Solo.xls');
     header('Cache-Control: max-age=0');
     header("Pragma: no-cache");
     header("Expires: 0");


     $writer->save('php://output');

    }

    public function exportCcYogyakarta()
      {
        $data_proccess = $this->export->selectCcYogyakarta()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B1', 'Tanggal Backup :')
        ->setCellValue('A3', 'No')
        ->setCellValue('B3', 'NIK')
        ->setCellValue('C3', 'Nama')
        ->setCellValue('D3', 'Band Posisi')
        ->setCellValue('E3', 'Jabatan')
        ->setCellValue('F3', 'Nomor Internet')
        ->setCellValue('G3', 'Nomor Telephone')
        ->setCellValue('H3', 'Alat Produksi')
        ->setCellValue('I3', 'NIK di Data Pelanggan')
        ->setCellValue('J3', 'Segmen/Paket')
        ->setCellValue('K3', 'Telp Rumah')
        ->setCellValue('L3', 'Non FO')
        ->setCellValue('M3', 'FO')
        ->setCellValue('N3', 'Kuota')
        ->setCellValue('O3', 'Usee TV')
        ->setCellValue('P3', 'Realisasi Pagu')
        ->setCellValue('Q3', 'Lokasi Fasteljab')
        ->setCellValue('R3', 'Lokasi Kerja');

        $backup = date("d-F-Y");
        $kolom_backup = 1;
        $kolom = 4;
        $nomor = 1;

        if (!$data_proccess) {
                #kosong ...
        } else {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $kolom_backup, $backup);
        }

        foreach($data_proccess as $p) {

         $spreadsheet->setActiveSheetIndex(0)
         ->setCellValue('A' . $kolom, $nomor)
         ->setCellValue('B' . $kolom, $p->nik)
         ->setCellValue('C' . $kolom, $p->nama)
         ->setCellValue('D' . $kolom, $p->posisi)
         ->setCellValue('E' . $kolom, $p->jabatan)
         ->setCellValue('F' . $kolom, $p->no_internet)
         ->setCellValue('G' . $kolom, $p->no_telp)
         ->setCellValue('H' . $kolom, $p->alpro)
         ->setCellValue('I' . $kolom, $p->isiska)
         ->setCellValue('J' . $kolom, $p->segmen)
         ->setCellValue('K' . $kolom, $p->pagu_telp)
         ->setCellValue('L' . $kolom, $p->non_fo)
         ->setCellValue('M' . $kolom, $p->fo)
         ->setCellValue('N' . $kolom, $p->kuota)
         ->setCellValue('O' . $kolom, $p->usee_tv)
         ->setCellValue('P' . $kolom, $p->status)
         ->setCellValue('Q' . $kolom, $p->lok_fasteljab)
         ->setCellValue('R' . $kolom, $p->lok_kerja);

         $kolom++;
         $nomor++;

     }

     $writer = new Xlsx($spreadsheet);

     header('Content-Type: application/vnd-ms-excel');
     header('Content-Disposition: attachment; filename=Data Fasteljab Witel Yogyakarta.xls');
     header('Cache-Control: max-age=0');
     header("Pragma: no-cache");
     header("Expires: 0");


     $writer->save('php://output');

    }

    public function exportCcMagelang()
      {
        $data_proccess = $this->export->selectCcMagelang()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B1', 'Tanggal Backup :')
        ->setCellValue('A3', 'No')
        ->setCellValue('B3', 'NIK')
        ->setCellValue('C3', 'Nama')
        ->setCellValue('D3', 'Band Posisi')
        ->setCellValue('E3', 'Jabatan')
        ->setCellValue('F3', 'Nomor Internet')
        ->setCellValue('G3', 'Nomor Telephone')
        ->setCellValue('H3', 'Alat Produksi')
        ->setCellValue('I3', 'NIK di Data Pelanggan')
        ->setCellValue('J3', 'Segmen/Paket')
        ->setCellValue('K3', 'Telp Rumah')
        ->setCellValue('L3', 'Non FO')
        ->setCellValue('M3', 'FO')
        ->setCellValue('N3', 'Kuota')
        ->setCellValue('O3', 'Usee TV')
        ->setCellValue('P3', 'Realisasi Pagu')
        ->setCellValue('Q3', 'Lokasi Fasteljab')
        ->setCellValue('R3', 'Lokasi Kerja');
        
        $backup = date("d-F-Y");
        $kolom_backup = 1;
        $kolom = 4;
        $nomor = 1;

        if (!$data_proccess) {
                #kosong ...
        } else {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $kolom_backup, $backup);
        }

        foreach($data_proccess as $p) {

         $spreadsheet->setActiveSheetIndex(0)
         ->setCellValue('A' . $kolom, $nomor)
         ->setCellValue('B' . $kolom, $p->nik)
         ->setCellValue('C' . $kolom, $p->nama)
         ->setCellValue('D' . $kolom, $p->posisi)
         ->setCellValue('E' . $kolom, $p->jabatan)
         ->setCellValue('F' . $kolom, $p->no_internet)
         ->setCellValue('G' . $kolom, $p->no_telp)
         ->setCellValue('H' . $kolom, $p->alpro)
         ->setCellValue('I' . $kolom, $p->isiska)
         ->setCellValue('J' . $kolom, $p->segmen)
         ->setCellValue('K' . $kolom, $p->pagu_telp)
         ->setCellValue('L' . $kolom, $p->non_fo)
         ->setCellValue('M' . $kolom, $p->fo)
         ->setCellValue('N' . $kolom, $p->kuota)
         ->setCellValue('O' . $kolom, $p->usee_tv)
         ->setCellValue('P' . $kolom, $p->status)
         ->setCellValue('Q' . $kolom, $p->lok_fasteljab)
         ->setCellValue('R' . $kolom, $p->lok_kerja);

         $kolom++;
         $nomor++;

     }

     $writer = new Xlsx($spreadsheet);

     header('Content-Type: application/vnd-ms-excel');
     header('Content-Disposition: attachment; filename=Data Fasteljab Witel Magelang.xls');
     header('Cache-Control: max-age=0');
     header("Pragma: no-cache");
     header("Expires: 0");


     $writer->save('php://output');

    }

    public function exportCcPekalongan()
      {
        $data_proccess = $this->export->selectCcPekalongan()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B1', 'Tanggal Backup :')
        ->setCellValue('A3', 'No')
        ->setCellValue('B3', 'NIK')
        ->setCellValue('C3', 'Nama')
        ->setCellValue('D3', 'Band Posisi')
        ->setCellValue('E3', 'Jabatan')
        ->setCellValue('F3', 'Nomor Internet')
        ->setCellValue('G3', 'Nomor Telephone')
        ->setCellValue('H3', 'Alat Produksi')
        ->setCellValue('I3', 'NIK di Data Pelanggan')
        ->setCellValue('J3', 'Segmen/Paket')
        ->setCellValue('K3', 'Telp Rumah')
        ->setCellValue('L3', 'Non FO')
        ->setCellValue('M3', 'FO')
        ->setCellValue('N3', 'Kuota')
        ->setCellValue('O3', 'Usee TV')
        ->setCellValue('P3', 'Realisasi Pagu')
        ->setCellValue('Q3', 'Lokasi Fasteljab')
        ->setCellValue('R3', 'Lokasi Kerja');

        $backup = date("d-F-Y");
        $kolom_backup = 1;
        $kolom = 4;
        $nomor = 1;

        if (!$data_proccess) {
                #kosong ...
        } else {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $kolom_backup, $backup);
        }

        foreach($data_proccess as $p) {

         $spreadsheet->setActiveSheetIndex(0)
         ->setCellValue('A' . $kolom, $nomor)
         ->setCellValue('B' . $kolom, $p->nik)
         ->setCellValue('C' . $kolom, $p->nama)
         ->setCellValue('D' . $kolom, $p->posisi)
         ->setCellValue('E' . $kolom, $p->jabatan)
         ->setCellValue('F' . $kolom, $p->no_internet)
         ->setCellValue('G' . $kolom, $p->no_telp)
         ->setCellValue('H' . $kolom, $p->alpro)
         ->setCellValue('I' . $kolom, $p->isiska)
         ->setCellValue('J' . $kolom, $p->segmen)
         ->setCellValue('K' . $kolom, $p->pagu_telp)
         ->setCellValue('L' . $kolom, $p->non_fo)
         ->setCellValue('M' . $kolom, $p->fo)
         ->setCellValue('N' . $kolom, $p->kuota)
         ->setCellValue('O' . $kolom, $p->usee_tv)
         ->setCellValue('P' . $kolom, $p->status)
         ->setCellValue('Q' . $kolom, $p->lok_fasteljab)
         ->setCellValue('R' . $kolom, $p->lok_kerja);

         $kolom++;
         $nomor++;

     }

     $writer = new Xlsx($spreadsheet);

     header('Content-Type: application/vnd-ms-excel');
     header('Content-Disposition: attachment; filename=Data Fasteljab Witel Pekalongan.xls');
     header('Cache-Control: max-age=0');
     header("Pragma: no-cache");
     header("Expires: 0");


     $writer->save('php://output');

    }

    public function exportCcPurwokerto()
      {
        $data_proccess = $this->export->selectCcPurwokerto()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B1', 'Tanggal Backup :')
        ->setCellValue('A3', 'No')
        ->setCellValue('B3', 'NIK')
        ->setCellValue('C3', 'Nama')
        ->setCellValue('D3', 'Band Posisi')
        ->setCellValue('E3', 'Jabatan')
        ->setCellValue('F3', 'Nomor Internet')
        ->setCellValue('G3', 'Nomor Telephone')
        ->setCellValue('H3', 'Alat Produksi')
        ->setCellValue('I3', 'NIK di Data Pelanggan')
        ->setCellValue('J3', 'Segmen/Paket')
        ->setCellValue('K3', 'Telp Rumah')
        ->setCellValue('L3', 'Non FO')
        ->setCellValue('M3', 'FO')
        ->setCellValue('N3', 'Kuota')
        ->setCellValue('O3', 'Usee TV')
        ->setCellValue('P3', 'Realisasi Pagu')
        ->setCellValue('Q3', 'Lokasi Fasteljab')
        ->setCellValue('R3', 'Lokasi Kerja');

        $backup = date("d-F-Y");
        $kolom_backup = 1;
        $kolom = 4;
        $nomor = 1;

        if (!$data_proccess) {
                #kosong ...
        } else {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $kolom_backup, $backup);
        }

        foreach($data_proccess as $p) {

         $spreadsheet->setActiveSheetIndex(0)
         ->setCellValue('A' . $kolom, $nomor)
         ->setCellValue('B' . $kolom, $p->nik)
         ->setCellValue('C' . $kolom, $p->nama)
         ->setCellValue('D' . $kolom, $p->posisi)
         ->setCellValue('E' . $kolom, $p->jabatan)
         ->setCellValue('F' . $kolom, $p->no_internet)
         ->setCellValue('G' . $kolom, $p->no_telp)
         ->setCellValue('H' . $kolom, $p->alpro)
         ->setCellValue('I' . $kolom, $p->isiska)
         ->setCellValue('J' . $kolom, $p->segmen)
         ->setCellValue('K' . $kolom, $p->pagu_telp)
         ->setCellValue('L' . $kolom, $p->non_fo)
         ->setCellValue('M' . $kolom, $p->fo)
         ->setCellValue('N' . $kolom, $p->kuota)
         ->setCellValue('O' . $kolom, $p->usee_tv)
         ->setCellValue('P' . $kolom, $p->status)
         ->setCellValue('Q' . $kolom, $p->lok_fasteljab)
         ->setCellValue('R' . $kolom, $p->lok_kerja);

         $kolom++;
         $nomor++;

     }

     $writer = new Xlsx($spreadsheet);

     header('Content-Type: application/vnd-ms-excel');
     header('Content-Disposition: attachment; filename=Data Fasteljab Witel Purwokerto.xls');
     header('Cache-Control: max-age=0');
     header("Pragma: no-cache");
     header("Expires: 0");


     $writer->save('php://output');

    }

    public function exportCcKudus()
      {
        $data_proccess = $this->export->selectCcKudus()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B1', 'Tanggal Backup :')
        ->setCellValue('A3', 'No')
        ->setCellValue('B3', 'NIK')
        ->setCellValue('C3', 'Nama')
        ->setCellValue('D3', 'Band Posisi')
        ->setCellValue('E3', 'Jabatan')
        ->setCellValue('F3', 'Nomor Internet')
        ->setCellValue('G3', 'Nomor Telephone')
        ->setCellValue('H3', 'Alat Produksi')
        ->setCellValue('I3', 'NIK di Data Pelanggan')
        ->setCellValue('J3', 'Segmen/Paket')
        ->setCellValue('K3', 'Telp Rumah')
        ->setCellValue('L3', 'Non FO')
        ->setCellValue('M3', 'FO')
        ->setCellValue('N3', 'Kuota')
        ->setCellValue('O3', 'Usee TV')
        ->setCellValue('P3', 'Realisasi Pagu')
        ->setCellValue('Q3', 'Lokasi Fasteljab')
        ->setCellValue('R3', 'Lokasi Kerja');
        
        $backup = date("d-F-Y");
        $kolom_backup = 1;
        $kolom = 4;
        $nomor = 1;

        if (!$data_proccess) {
                #kosong ...
        } else {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $kolom_backup, $backup);
        }

        foreach($data_proccess as $p) {

         $spreadsheet->setActiveSheetIndex(0)
         ->setCellValue('A' . $kolom, $nomor)
         ->setCellValue('B' . $kolom, $p->nik)
         ->setCellValue('C' . $kolom, $p->nama)
         ->setCellValue('D' . $kolom, $p->posisi)
         ->setCellValue('E' . $kolom, $p->jabatan)
         ->setCellValue('F' . $kolom, $p->no_internet)
         ->setCellValue('G' . $kolom, $p->no_telp)
         ->setCellValue('H' . $kolom, $p->alpro)
         ->setCellValue('I' . $kolom, $p->isiska)
         ->setCellValue('J' . $kolom, $p->segmen)
         ->setCellValue('K' . $kolom, $p->pagu_telp)
         ->setCellValue('L' . $kolom, $p->non_fo)
         ->setCellValue('M' . $kolom, $p->fo)
         ->setCellValue('N' . $kolom, $p->kuota)
         ->setCellValue('O' . $kolom, $p->usee_tv)
         ->setCellValue('P' . $kolom, $p->status)
         ->setCellValue('Q' . $kolom, $p->lok_fasteljab)
         ->setCellValue('R' . $kolom, $p->lok_kerja);

         $kolom++;
         $nomor++;

     }

     $writer = new Xlsx($spreadsheet);

     header('Content-Type: application/vnd-ms-excel');
     header('Content-Disposition: attachment; filename=Data Fasteljab Witel Kudus.xls');
     header('Cache-Control: max-age=0');
     header("Pragma: no-cache");
     header("Expires: 0");


     $writer->save('php://output');

    }



}
