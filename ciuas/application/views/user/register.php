<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <div class="panel-title">Data UKM</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?php foreach ($mahasiswa as $row_mahasiswa) { ?>
                                    <?php $date = date_create($row_mahasiswa['tanggal_lahir']);
                                    $new_date = date_format($date, "d-F-Y"); ?>
                                    <label>Nama : </label> <?php echo $row_mahasiswa['nama_mahasiswa']; ?> <br />
                                    <label>Kelas : </label> <?php echo $row_mahasiswa['kelas']; ?><?php echo $row_mahasiswa['jurusan']; ?><?php echo $row_mahasiswa['rombel']; ?> <br />
                                    <label>TTL : </label> <?php echo $row_mahasiswa['tempat_lahir']; ?>, <?php echo $new_date; ?> <br />
                                    <label for="nis">NIM :</label> <?php echo $row_mahasiswa['nim']; ?>
                                <?php } ?>
                            </div>
                        </div>
                        <?php if (empty($set_ukm)) { ?>
                            <div class="alert alert-danger">
                                Anda belum mengikuti UKM satu pun
                            </div>
                        <?php } else { ?>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama UKM</th>
                                        <th>Lokasi</th>
                                        <th>Jadwal UKM</th>
                                        <th>Tanggal Daftar</th>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($set_ukm as $row_ukm) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row_ukm['nama_ukm']; ?></td>
                                                <td><?php echo $row_ukm['lokasi']; ?></td>
                                                <td><?php echo $row_ukm['hari']; ?>, <?php echo $row_ukm['jam_mulai']; ?> - <?php echo $row_ukm['jam_selesai']; ?></td>
                                                <td><?php echo $row_ukm['tanggal_daftar']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <a href="#" class="act-btn" data-toggle="modal" data-target="#myModal">+</a>
            <?php echo $this->session->flashdata('notify'); ?>
            <?php echo validation_errors(); ?>
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Registrasi UKM</h3>
                    <p class="panel-subtitle">User / Registrasi UKM</p>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="display" id="data">
                            <thead>
                                <tr>
                                    <th>Nama UKM</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Lokasi UKM</th>
                                    <th>Jadwal UKM</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ukm as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['nama_ukm']; ?></td>
                                        <td><?php echo $row['penanggung_jawab']; ?></td>
                                        <td><?php echo $row['lokasi']; ?></td>
                                        <td><?php echo $row['hari']; ?>, <?php echo $row['jam_mulai']; ?> - <?php echo $row['jam_selesai']; ?></td>
                                        <td>
                                            <?php echo anchor('user/registered/' . $row['id_ukm'], '<button class="btn btn-success" onclick="return confirm("Anda yakin ingin mengikuti ekskul ini?")"><i class="fa fa-check"></i> Registrasi</button>', array('onclick' => 'return confirm("Anda yakin ingin mengikuti ekskul ini?")')); ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
    </div>
</div>