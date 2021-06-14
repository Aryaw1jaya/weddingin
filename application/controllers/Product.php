<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		is_admin();
		$this->load->model('product_model', 'product');
	}
	
	public function index()
	{
		$data['title']		= 'Products';
		$data['product']	= $this->product->getAllProduct();
		$data['page']		= 'pages/product/index';

		$this->load->view('layouts/app', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('name', 'Product name', 'required',[
			'required' => 'Product name is required.',
		]);
		$this->form_validation->set_rules('price', 'Price', 'required|numeric',[
			'required' => 'Price is required.',
			'numeric'  => 'Price must number.'
		]);
		$this->form_validation->set_rules('description', 'Description', 'required',[
			'required' => 'Description is required.',
		]);
		$this->form_validation->set_rules('fasilitas', 'System requriements', 'required',[
			'required' => 'System requriements is required.',
		]);

		if($this->form_validation->run() == false) {
			$data['title']	= 'Add Product';
			$data['page']	= 'pages/product/add';
			$this->load->view('layouts/app', $data);
		}else {
			$data = [
				'name'			=> $this->input->post('name'),
				'price'			=> $this->input->post('price'),
				'edition'		=> $this->input->post('edition'),
				'description'	=> $this->input->post('description'),
				'fasilitas'	=> $this->input->post('fasilitas'),
			];

			if(!empty($_FILES['image']['name'])){
				$upload = $this->product->uploadImage();	
				$data['image'] = $upload;
			}

			$this->product->insertProduct($data);
			$this->session->set_flashdata('success', 'Product succesfully added.');

			redirect(base_url('product'));
		}
	}

	public function edit($id) {
		$this->form_validation->set_rules('name', 'Product name', 'required',[
			'required' => 'Product name is required.',
		]);
		$this->form_validation->set_rules('price', 'Price', 'required|numeric',[
			'required' => 'Price is required.',
			'numeric'  => 'Price must number.'
		]);
		$this->form_validation->set_rules('description', 'Description', 'required',[
			'required' => 'Description is required.',
		]);
		$this->form_validation->set_rules('fasilitas', 'System requriements', 'required',[
			'required' => 'System requriements is required.',
		]);

		if($this->form_validation->run() == false) {
			$data['title']		= 'Update Products';
			$data['page']		= 'pages/product/edit';
			$data['product']	= $this->product->getProduct($id);
			$this->load->view('layouts/app', $data);
		}else {
			$id = $this->input->post('id');
			$data = [
				'name'			=> $this->input->post('name'),
				'price'			=> $this->input->post('price'),
				'edition'		=> $this->input->post('edition'),
				'description'	=> $this->input->post('description'),
				'fasilitas'	=> $this->input->post('fasilitas'),
			];

			if(!empty($_FILES['image']['name'])){
				$upload 	 = $this->product->uploadImage();
				if($upload){
					$productImage = $this->product->getProduct($id);
					if(file_exists('images/product/' . $productImage['image']) && $productImage['image']){
						unlink('images/product/' . $productImage['image']);
					}
					
					$data['image'] = $upload;
				}else{
					redirect(base_url('product/edit'));
				}
			}

			$this->product->updateProduct($id, $data);
			$this->session->set_flashdata('success', 'Products succesfully updated.');

			redirect(base_url('product'));
		}
	}

	public function delete($id) {
		$produk = $this->product->getProduct(($id));
		unlink('images/product/' . $produk['image']);
		$this->product->deleteProduct($id);
		$this->session->set_flashdata('success', 'Products succesfully deleted.');

		redirect(base_url('product'));
	}

}

/* End of file Product.php */
