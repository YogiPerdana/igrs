<style type="text/css">

</style>
<div  class="container">
		<div class="row">
			<!-- col-md-8 -->
			<div class="col-md-9">
				<div class="well well-lg">
					<section class="content">
			      <!-- Main row -->
			     
			      <div class="box box-info">
			        <div class="box-body">
			          <div class="alert alert-warning" role="alert">
			            <i class="fa fa-info-circle hint"></i> Ukuran Gambar Maksimal 300KB
			          </div>
			      	  <!--  -->
			          <form class="form-horizontal" id="tokek" action="<?= base_url()?>artikel/uploadartikel" method="post" enctype="multipart/form-data">  
			          	<div class="form-group">
			            <!--   <label for="gambar" class="col-sm-2 control-label">Gambar</label> -->
			              <div class="col-md-5 col-md-offset-5">
			                <div class="input-group input-group-sm col-md-8 clearfix">
			                  <input style="width: 200px;height: 160px;" id="cover" name="cover" type="file" class="form-control" />
			                  <!-- <span class="input-group-btn">
			                    <input type="submit" value="Upload" class="btn btn-info btn-flat" />
			                  </span> -->
			                </div>
			              </div>
			            </div>   
			            <div class="form-group">
			              <label for="judul" class="col-sm-2 control-label">Judul berita</label>
			              <div class="col-sm-10">
			               <input id="judul" name="judul" type="text" maxlength="100" class="form-control" placeholder=""><span id="count" class="label label-info"> </span>
			              </div>	              
			            </div>
			            <div class="form-group">
		                  <label for="inputIsi" class="col-sm-2 control-label">Isi</label>
		                  <div class="col-sm-10">
		                    <div class="box">
		                      <form>
		                        <textarea id="isi" name="isi" class="textarea" placeholder="" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
		                      </form>
		                    </div>
		                  </div>
		                </div>
			            <div class="form-group">
			              <label for="referensi" class="col-sm-2 control-label">Referensi</label>
			              <div class="col-sm-10">
			                <input id="url" nama="url" required type="url" class="form-control" placeholder="http://www.lalala.com">
			              </div>
			            </div>
			            <br><br>
			            <div class="form-group">
			            	<div class="col-md-12 text-center">
					        	<div class="box-footer form-inline">
					              <button type="submit" class="btn btn-primary">Batal</button>
					              <button href="" type="submit" class="btn btn-primary">Simpan</button>
					              <button type="submit" class="btn btn-primary">Lihat</button>
					            </div>
				            </div>
			            </div>
			          <!-- </form>  -->
			          </form>
			   
			        </div>
			      </div>
			      <!-- /.row (main row) -->
			    	</section>	
				</div>
				
			</div><!-- col-md-8 /- -->
			<div class="col-md-3">
				<div class="widget-sidebar">
					<aside class="widget widget_latest_post">
						<h3 class="widget-title">Most Popular</h3>
						<div class="widget-inner">
							<ul class="post">
								<li>
									<div class="col-md-5 col-sm-5 col-xs-4">
										<a href="#"><img src="<?php echo base_url()?>assets/images/widget/widget-post-1.jpg" alt="popular-post" /></a>
									</div>
									<div class="col-md-7 col-sm-7 col-xs-8">
										<a href="#" class="post-title">where you can see our  of troubles are all </a>
										<p>
											<a href="#"><i class="fa fa-heart"></i> 33</a> 
											<span><i class="fa fa-clock-o"></i> 1 Hour ago</span>
										</p>
									</div>
								</li>
								<li>
									<div class="col-md-5 col-sm-5 col-xs-4">
										<a href="#"><img src="<?php echo base_url()?>assets/images/widget/widget-post-2.jpg" alt="popular-post" /></a>
									</div>
									<div class="col-md-7 col-sm-7 col-xs-8">
										<a href="#" class="post-title">crew the Minnow would be lost the Minnow</a>
										<p>
											<a href="#"><i class="fa fa-heart"></i> 30</a> 
											<span><i class="fa fa-clock-o"></i> 1 Hour ago</span>
										</p>
									</div>
								</li>
								<li>
									<div class="col-md-5 col-sm-5 col-xs-4">
										<a href="#"><img src="<?php echo base_url()?>assets/images/widget/widget-post-3.jpg" alt="popular-post" /></a>
									</div>
									<div class="col-md-7 col-sm-7 col-xs-8">
										<a href="#" class="post-title">Come and listen to a story about Jed</a>
										<p>
											<a href="#"><i class="fa fa-heart"></i> 25</a> 
											<span><i class="fa fa-clock-o"></i> 1 Hour ago</span>
										</p>
									</div>
								</li>
							</ul>
						</div>
					</aside><!-- Latest Post /- -->
				</div>
			</div>
		</div>
</div><!-- container /- -->

<script type="text/javascript">
	var judul = document.getElementById('judul');
	var length = judul.getAttribute("maxlength");
	var count = document.getElementById('count');
	count.innerHTML = length;
	judul.onkeyup = function () {
  		document.getElementById('count').innerHTML = (length - this.value.length);
  		if(length-this.value.length <20){

  		}
	};
	
		tinymce.init({
  			selector: 'textarea',  // change this value according to your HTML
  			auto_focus: 'element1',
  			plugins: "image imagetools",
  			imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions",
  			images_upload_base_path: './assets/images'
		});	
	
	
</script>