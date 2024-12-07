<?php if (session()->get('status') == 1) : ?>
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div class="page-header">
                    <h4 class="page-title text-white"><?= $title ?></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card">
                    <div class="swal" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
                    <div class="card-header">
                        <a href="<?= base_url('data-siswa/add') ?>" class="badge badge-primary btn-sm">
                            <i class="fa fa-plus-circle"></i>&nbsp;Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <!-- <form method="post">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4 mt-2">
                                <select name="kls" class="form-control">
                                    <option>.::Pilih Kelas::.</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                </select>
                            </div>
                            <div class="col-md-2 mt-2">
                                <button type="submit" class="btn btn-primary ml-lg-1 btn-sm" name="filterkls"><i class="fa fa-search"></i> Filter Kelas</button>
                            </div>
                        </div>
                    </div>
                </form> -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <?php if (session()->get('level') == '1') { ?>
                                                <th>Jurusan</th>
                                            <?php } ?>
                                            <?php if (session()->get('level') == '2') { ?>
                                                <th>Paket keahlian</th>
                                            <?php } ?>
                                            <th>Status</th>
                                            <th>Tahun Masuk</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($datasiswa as $key => $r) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $r['nisn']; ?></td>
                                                <td><?= $r['nama']; ?></td>
                                                <td><?= $r['kelas']; ?></td>
                                                <?php if (session()->get('level') == '1') { ?>
                                                    <td><?= $r['jurusan']; ?></td>
                                                <?php } ?>
                                                <?php if (session()->get('level') == '2') { ?>
                                                    <td><?= $r['pkeahlian']; ?></td>
                                                <?php } ?>
                                                <td><?= $r['status']; ?></td>
                                                <td><?= $r['tahun_msk']; ?></td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="<?= base_url('data-siswa/edit/' . $r['id']) ?>" title="Edit" class="btn btn-warning btn-xs mr-2">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-danger btn-xs" title="Delete" data-toggle='modal' data-target='#activateModal<?= $r['id'] ?>'>
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <?php foreach ($datasiswa as $r) { ?>
        <form action="<?= base_url('data-siswa/' . $r['id']); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="modal fade" id="activateModal<?= $r['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apa kamu yakin ingin menghapus data <span class="text-danger"><?= $r['nama'] ?></span> ini secara permanen ???
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-default btn-sm" type="button" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-primary btn-sm">Ya</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php } ?>
<?php else : ?>
    <div class="col-md-12">
        <div class="card mt-4">
            <div class="card-body">
                <h2>
                    <center>Maaf, akun anda sudah tidak aktif . . .</center>
                </h2>
            </div>
        </div>
    </div>
<?php endif ?>
</div>