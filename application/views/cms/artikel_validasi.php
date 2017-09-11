  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="box box-info">
      <div class="box-header">
      </div>
      <div class="box-body">
      <tbody>
          <?php foreach ($artikel as $artikel_item) { ?>
          <tr>
              
              
              
          </tr>
          <?php }; ?>
      </tbody>
  </table>
        <table id="example2" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Id Artikel</th>
              <th>Judul</th>
              <th>Isi</th>
              <th>Penulis</th>
              <th>Status</th>
              <th>Waktu Pembuatan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($artikel as $artikel_item) { ?>
            <tr>
              <td><?php echo $artikel_item['id_artikel']; ?></td>
              <td><a href="<?php echo site_url('cms/artikel/'.$artikel_item['slug']); ?>"><?php echo $artikel_item['judul']; ?></a></td>                
              <td><?php echo excerpt($artikel_item['isi']); ?></td>
              <td><?php echo $artikel_item['artikel_contributor']; ?></td>
              <td><?php echo $artikel_item['artikel_status']; ?></td>
              <td><?php echo $artikel_item['artikel_time']; ?></td>
              <td><a href="<?php echo site_url('cms/artikel/konfirmasi/'.$artikel_item['id_artikel']); ?>">Konfirmasi</a></td>
              <td><a href="<?php echo site_url('cms/artikel/update/'.$artikel_item['id_artikel']); ?>">Edit</a></td>
              <td><a href="<?php echo site_url('cms/artikel/delete/'.$artikel_item['id_artikel']); ?>">Hapus</a></td>
            </tr>
            <?php }; ?>
          </tbody>
        </table> 
      </div>
    </div>
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->