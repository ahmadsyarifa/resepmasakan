<!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Resep Baru</h1>
                </div>
            </div>
 
            <?php echo form_open_multipart('karyawan/inputKaryawan'); ?>
                    <div class="form-group">
                        <label>Nama Resep</label>
                        <input class="form-control" name="nama" placeholder="Nama Resep...">
                    </div>
                    <?php echo form_error('nama'); ?>
 
                    <div class="form-group">
                        <label>Bahan Bahan</label>
                        <input class="form-control" type="varchar" name="Bahan" placeholder="Bahan Bahan...">
                    </div>
                    <?php echo form_error('Bahan'); ?>
 
                    <div class="form-group">
                        <label>Cara Membuat</label>
                        <textarea name="Cara Membuat" class="form-control" placeholder="Cara Membuat..."></textarea>
                    </div>
                    <?php echo form_error('Cara Membuat'); ?>
 
                    <div class="form-group">
                        <label>Foto Resep</label>
                        <input class="form-control" type="file" name="foto">
                    </div>
 
                    <div class="form-group">
                        <input class="btn" type="submit" name="submit" value="Tambah">
                    </div>
                </form>
 
        </div>
    </div>