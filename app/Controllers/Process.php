<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Ncrprocess;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\ZipArchive;
use PhpOffice\PhpWord\Writer\Word2007;

class Process extends BaseController
{
    protected $ncrProcess;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->ncrProcess = new Ncrprocess();
    }

    public function create_process()
    {
        session();

        $data = [
            'title' => 'Form Tambah Data Report',
            // 'validation' => \Config\Services::validation()
        ];
        return view('form_process_view', $data);
    }



    public function save()
    {
        if (!$this->validate([
            'problem' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi'
                ]
            ],
            'area' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi'
                ]
            ],
            'qty' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi'
                ]
            ],
            'departemen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi'
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();

            return redirect()->to('/form_process')->withInput();
        };

        // ambil foto 
        $fileFoto = $this->request->getFile('foto');
        // apakah tidak ada foto yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.jpg';
        } else {
            // generate nama file random
            $namaFoto = $fileFoto->getName();
            // pindahkan file ke folder img
            $fileFoto->move('img_uploaded', $namaFoto);
        }


        // insert data
        $this->ncrProcess->save([
            'problem' => $this->request->getVar('problem'),
            'area' => $this->request->getVar('area'),
            'qty' => $this->request->getVar('qty'),
            'departemen' => $this->request->getVar('departemen'),
            'foto' => $namaFoto
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/form_process');
    }

    public function index_process()
    {
        $process = $this->ncrProcess->findAll();
        $data = [
            'title' => 'Daftar Laporan NCR Process',
            'process' => $process
        ];
        return view('report/index_process_view', $data);
    }

    // public function export()
    // {
    //     /* ------------PERTAMA---------------- */
    //     // $spreadsheet = new Spreadsheet();
    //     // $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
    //     // $sheet = $spreadsheet->getActiveSheet();

    //     // $sheet->setCellValue('A1', "DATA LAPORAN NCR");
    //     // $sheet->mergeCells('A1:D1');
    //     // $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
    //     // $sheet->getStyle('A1')->getFont()->setBold(true);
    //     // $sheet->getStyle('A1')->getFont()->setSize(16);

    //     // $sheet->setCellValue('A3', 'No');
    //     // $sheet->setCellValue('B3', 'Problem');
    //     // $sheet->setCellValue('C3', 'Area');
    //     // $sheet->setCellValue('D3', 'Qty');
    //     // $sheet->setCellValue('E3', 'Departemen');
    //     // $sheet->setCellValue('F3', 'Foto');

    //     // $process = $this->ncrProcess->findAll();
    //     // $no = 1;
    //     // $x = 4;
    //     // foreach ($process as $row) {
    //     //     $sheet->setCellValue('A' . $x, $no++);
    //     //     $sheet->setCellValue('B' . $x, $row['problem']);
    //     //     $sheet->setCellValue('C' . $x, $row['area']);
    //     //     $sheet->setCellValue('D' . $x, $row['qty']);
    //     //     $sheet->setCellValue('E' . $x, $row['departemen']);
    //     //     $sheet->setCellValue('F' . $x, $row['foto']);
    //     //     $x++;
    //     // }

    //     // $writer = new Xlsx($spreadsheet);
    //     // $filename = 'laporan-ncr-process';

    //     // header('Content-Type: application/vnd.ms-excel');
    //     // header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
    //     // header('Cache-Control: max-age=0');

    //     // $writer->save('php://output');
    //     // $processModel = new Ncrprocess();
    //     // $process = $processModel->findAll();

    //     // $spreadsheet = new Spreadsheet();
    //     // $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);

    //     // $spreadsheet->setActiveSheetIndex(0)
    //     //     ->setCellValue('A1', 'DATA LAPORAN NCR PROCESS')
    //     //     ->setCellValue('A3', 'No')
    //     //     ->setCellValue('B3', 'Problem')
    //     //     ->setCellValue('C3', 'Area')
    //     //     ->setCellValue('D3', 'Qty')
    //     //     ->setCellValue('E3', 'Departemen')
    //     //     ->setCellValue('F3', 'Foto');

    //     // $column = 4;

    //     // foreach ($process as $p) {
    //     //     $spreadsheet->setActiveSheetIndex(0)
    //     //         ->setCellValue('A' . $column, $p['id'])
    //     //         ->setCellValue('B' . $column, $p['problem'])
    //     //         ->setCellValue('C' . $column, $p['area'])
    //     //         ->setCellValue('D' . $column, $p['qty'])
    //     //         ->setCellValue('E' . $column, $p['departemen'])
    //     //         ->setCellValue('F' . $column, $p['foto']);
    //     //     $column++;
    //     // }

    //     // $writer = new Xlsx($spreadsheet);
    //     // $filename = 'laporan-ncr-process';

    //     // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //     // header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
    //     // header('Cache-Control: max-age=0');

    //     // $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    //     // $writer->save('php://output');
    //     // exit();

    //     /* ------------PERTAMA---------------- */

    //     // mengambil data dari table db 
    //     $data = $this->ncrProcess->findAll();

    //     // membuat object baru dari class Spreadsheet
    //     $spreadsheet = new Spreadsheet();

    //     // membuat sheet baru
    //     $sheet = $spreadsheet->getActiveSheet();

    //     // mengatur nama sheet

    //     $spreadsheet->getProperties()
    //         ->setCreator('Nama Anda')
    //         ->setLastModifiedBy('Nama Anda')
    //         ->setTitle('Judul Dokumen')
    //         ->setSubject('Subject Dokumen')
    //         ->setDescription('Deskripsi Dokumen')
    //         ->setKeywords('Keyword Dokumen')
    //         ->setCategory('Kategori Dokumen');

    //     $sheet->setCellValue('A1', 'No');
    //     $sheet->setCellValue('B1', 'Problem');
    //     $sheet->setCellValue('C1', 'Area');
    //     $sheet->setCellValue('D1', 'Qty');
    //     $sheet->setCellValue('E1', 'Departemen');
    //     $sheet->setCellValue('F1', 'Foto');

    //     // set lebar kolom pada sheet 
    //     $sheet->getColumnDimension('A')->setWidth(5);
    //     $sheet->getColumnDimension('B')->setWidth(20);
    //     $sheet->getColumnDimension('C')->setWidth(20);
    //     $sheet->getColumnDimension('D')->setWidth(20);
    //     $sheet->getColumnDimension('E')->setWidth(20);
    //     $sheet->getColumnDimension('F')->setWidth(20);

    //     // set font bold pada juduk kolom
    //     $sheet->getStyle('A1:F1')->getFont()->setBold(true);

    //     // set aligment pada judul kolom
    //     $sheet->getStyle('A:F')->getAlignment()->setHorizontal('center');

    //     // set border pada judul kolom
    //     $sheet->getStyle('A1:F1')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

    //     $rowNumber = 2;
    //     foreach ($data as $row) {
    //         $sheet->setCellValue('A' . $rowNumber, $row['id']);
    //         $sheet->setCellValue('B' . $rowNumber, $row['problem']);
    //         $sheet->setCellValue('C' . $rowNumber, $row['area']);
    //         $sheet->setCellValue('D' . $rowNumber, $row['qty']);
    //         $sheet->setCellValue('E' . $rowNumber, $row['departemen']);
    //         $sheet->setCellValue('F' . $rowNumber, $row['foto']);
    //         $rowNumber++;
    //     }

    //     // set nama file yang akan disimpan dan diunduh 
    //     $filename = 'Laporan NCR Process.xlsx';

    //     // buat objek writer untuk menulis file excel 
    //     $writer = new Xlsx($spreadsheet);

    //     // simpan file 
    //     $writer->save($filename);

    //     // unduh file
    //     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //     header('Content-Disposition: attachment;filename="' . $filename . '"');
    //     header('Cache-Control: max-age=0');

    //     $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    //     $reader->setReadDataOnly(true);
    //     $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    //     $writer->save('php://output');
    //     exit();
    // }

    public function export()
    {

        $phpWord = new PhpWord();
        $phpWord->addTitleStyle(1, ['size' => 16, 'bold' => true, 'name' => 'Arial', 'allCaps' => true], ['alignment' => 'center']);
        $section = $phpWord->addSection(['orientation' => 'landscape']);
        $section->addTitle('Laporan NCR Process');
        $section->addTextBreak();
        $table = $section->addTable(['borderSize' => 3]);
        $table->addRow();
        $table->addCell(1000)->addText('No', ['allCaps' => true, 'bold' => true,], ['alignment' => 'center']);
        $table->addCell(5000)->addText('Problem', ['allCaps' => true, 'bold' => true,], ['alignment' => 'center']);
        $table->addCell(5000)->addText('Area', ['allCaps' => true, 'bold' => true,], ['alignment' => 'center']);
        $table->addCell(5000)->addText('Quantity', ['allCaps' => true, 'bold' => true,], ['alignment' => 'center']);
        $table->addCell(5000)->addText('Departemen', ['allCaps' => true, 'bold' => true,], ['alignment' => 'center']);
        $table->addCell(5000)->addText('Foto', ['allCaps' => true, 'bold' => true,], ['alignment' => 'center']);

        $data = $this->ncrProcess->findAll();
        $no = 1;
        foreach ($data as $item) {
            $table->addRow();
            $table->addCell()->addText($no, [], ['alignment' => 'center']);
            $table->addCell()->addText($item['problem']);
            $table->addCell()->addText($item['area'], [], ['alignment' => 'center']);
            $table->addCell()->addText($item['qty'], [], ['alignment' => 'center']);
            $table->addCell()->addText($item['departemen'], [], ['alignment' => 'center']);
            $table->addCell()->addImage('img_uploaded/' . $item['foto'], [
                'width' => 100,
                'height' => 100,
                'align' => 'center',
            ]);
            $no++;
        }

        $writer = new Word2007($phpWord);

        header('Content-Type: application/msword');
        header('Content-Disposition: attachment;filename="Laporan NCR Process.docx"');
        header('Cache-Control: max-age=0');

        $writer->save("php://output");
        exit();
    }
}
