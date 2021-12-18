<?php

namespace App\Controllers;

use App\Models\SalesmanModel;
use App\Models\TransaksiModel;
use App\Models\BarangModel;
use App\Models\CustomerModel;

class Pages extends BaseController
{
    protected $salesmanModel;
    protected $barangModel;
    protected $customerModel;
    protected $transaksiModel;
    public function __construct()
    {
        $this->salesmanModel = new SalesmanModel();
        $this->barangModel = new BarangModel();
        $this->customerModel = new CustomerModel();
        $this->transaksiModel = new TransaksiModel();
    }

    public function randomNum()
    {
        $alphabet = "1234567890";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 3; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    public function randomNum2()
    {
        $alphabet = "1234567890";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 4; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    public function index()
    {
        $data = [
            'title' => 'Home | ci4'
        ];
        // return view('pages/home');
        // return view('welcome_message');
        // echo 'Hellow Word';
        echo view('layout/header', $data);
        echo view('pages/home');
        echo view('layout/footer');
    }

    public function salesman()
    {
        $salesman = $this->salesmanModel->findAll();

        $data = [
            'title' => 'Salesman | ci4',
            'salesman' => $salesman
        ];

        // return view('pages/about');
        // echo view('layout/header');
        // echo view('layout/footer');
        return view('pages/salesman', $data);
    }

    public function salesmanCreate()
    {
        // dd($randomKodeSalesman);
        // $this->request->getVar();
        $model = new SalesmanModel();
        $data = array(
            'kode_salesman' => $this->randomNum(),
            'nama_salesman' => $this->request->getPost('nama_salesman')
        );
        $model->saveSalesman($data);

        session()->setFlashdata('create', 'Data berhasil diinput.');
        return redirect()->to('http://localhost:8080/pages/salesman');
    }

    public function salesmanDelete($id)
    {
        $this->salesmanModel->delete($id);
        session()->setFlashdata('delete', 'Data berhasil dihapus.');
        return redirect()->to('http://localhost:8080/pages/salesman');
    }

    public function barang()
    {
        $barang = $this->barangModel->findAll();

        $data = [
            'title' => 'Barang | ci4',
            'salesman' => $barang
        ];

        return view('pages/barang', $data);
    }

    public function barangCreate()
    {
        // $reqQtyMasuk = $this->request->getPost('qty_masuk');
        // dd($reqQtyMasuk);

        $model = new BarangModel();
        $data = array(
            'kode_barang' => $this->randomNum2(),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'satuan' => $this->request->getPost('satuan'),
            'harga_satuan' => $this->request->getPost('harga_satuan'),
            'qty_masuk' => $this->request->getPost('qty_masuk')
        );
        $model->saveBarang($data);

        session()->setFlashdata('create', 'Data berhasil diinput.');
        return redirect()->to('http://localhost:8080/pages/barang');
    }

    public function barangDelete($id)
    {
        $this->barangModel->delete($id);
        session()->setFlashdata('delete', 'Data berhasil dihapus.');
        return redirect()->to('http://localhost:8080/pages/barang');
    }

    public function customer()
    {
        $customer = $this->customerModel->findAll();

        $data = [
            'title' => 'Customer | ci4',
            'salesman' => $customer
        ];

        return view('pages/customer', $data);
    }

    public function customerCreate()
    {
        $model = new CustomerModel();
        $data = array(
            'kode_customer' => $this->randomNum2(),
            'nama_customer' => $this->request->getPost('nama_customer'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon')
            // ,
            // 'longitude' => $this->request->getPost('longitude'),
            // 'latitude' => $this->request->getPost('latitude'),
        );
        $model->saveCustomer($data);

        session()->setFlashdata('create', 'Data berhasil diinput.');
        return redirect()->to('http://localhost:8080/pages/customer');
    }

    public function customerDelete($id)
    {
        $this->customerModel->delete($id);
        session()->setFlashdata('delete', 'Data berhasil dihapus.');
        return redirect()->to('http://localhost:8080/pages/customer');
    }

    public function transaksi()
    {
        $transaksi = $this->transaksiModel->findAll();
        $customer = $this->customerModel->findAll();
        $salesman = $this->salesmanModel->findAll();
        $barang = $this->barangModel->findAll();

        $data = [
            'title' => 'Barang | ci4',
            'transaksi' => $transaksi,
            'customer' => $customer,
            'salesman' => $salesman,
            'barang' => $barang,
        ];

        return view('pages/transaksi', $data);
    }

    public function transaksiCreate()
    {
        $model = new TransaksiModel();
        $data = array(
            'no_faktur' => $this->randomNum2(),
            'discount' => $this->request->getPost('discount'),
            'kode_customer' => $this->request->getPost('kode_customer'),
            'kode_salesman' => $this->request->getPost('kode_salesman'),
            'tgl_transaksi' => $this->request->getPost('tgl_transaksi'),
            // ,
            // 'longitude' => $this->request->getPost('longitude'),
            // 'latitude' => $this->request->getPost('latitude'),
        );
        $model->saveTransaksi($data);

        session()->setFlashdata('create', 'Data berhasil diinput.');
        return redirect()->to('http://localhost:8080/pages/transaksi');
    }

    public function transaksiDelete($id)
    {
        $this->transaksiModel->delete($id);
        session()->setFlashdata('delete', 'Data berhasil dihapus.');
        return redirect()->to('http://localhost:8080/pages/transaksi');
    }


    //------------------------------------------------------------------------------------

}
