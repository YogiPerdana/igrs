<?php

class ArtikelModel extends CI_Model{
  
  public function __construct(){
    $this->load->database();
  }

  public function get_artikel($slug = FALSE){

    if($slug === FALSE){
      $query = $this->db->get('ig_berita');
      return $query->result_array();
    }

    $query = $this->db->get_where('ig_berita', array('slug' => $slug));
    return $query->row_array();

  }

  public function get_artikel_id($id = FALSE){

    $query = $this->db->get_where('ig_berita', array('berita_id' => $id));
    return $query->row_array();

  }

  public function set_artikel(){
    $this->load->helper('url');

    $slug = url_title($this->input->post('berita_judul'), 'dash', TRUE);

    $data = array(
      'berita_judul' => $this->input->post('berita_judul'),
      'berita_teks' => $this->input->post('berita_teks'),
      'kategori' => $this->input->post('kategori'),
      'slug' => $slug
    );

    return $this->db->insert('ig_berita', $data);
  }

  public function update_artikel($id){
    $this->load->helper(array('url', 'form'));

    $slug = url_title($this->input->post('berita_judul'), 'dash', TRUE);

    $data = array(
      'berita_judul' => $this->input->post('berita_judul'),
      'berita_teks' => $this->input->post('berita_teks'),
      'kategori' => $this->input->post('kategori'),
      'slug' => $slug
    );

    $this->db->where('berita_id', $id);
    return $this->db->update('ig_berita', $data);
  }

  public function delete_artikel($id){
    return $this->db->delete('ig_berita', array('berita_id' => $id));
  }

}

 ?>