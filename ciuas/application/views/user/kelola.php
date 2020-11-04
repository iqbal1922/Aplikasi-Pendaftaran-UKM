<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <a href="#" class="act-btn" data-toggle="modal" data-target="#myModal">+</a>
            <?php echo $this->session->flashdata('notify'); ?>
            <?php echo validation_errors(); ?>
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Galeri UKM</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="display" id="data">
                            <thead>
                                <tr>
                                    <th>Nama UKM</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Lokasi Ekskul</th>
                                    <th>Jadwal Ekskul</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ukm as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['nama_ukm']; ?></td>
                                        <td><?php echo $row['penanggung_jawab']; ?></td>
                                        <td><?php echo $row['lokasi']; ?></td>
                                        <td><?php echo $row['hari']; ?>, <?php echo $row['jam_mulai']; ?> - <?php echo $row['jam_selesai']; ?></td>
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