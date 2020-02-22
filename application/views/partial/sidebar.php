<style>
.sidebar .menu {
    position: relative;
    overflow-y: hidden;
    height: 100%;
}
.sidebar .legal {
    position: absolute;
    bottom: 0;
    width: 100%;
    border-top: 1px solid #eee;
    padding: 15px;
}
</style>

<section >
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar" style="height: 100%; overflow-y:auto">
        <!-- User Info -->
        
        <div class="user-info">
            <div class="image">
                <img src="<?= base_url() ?>images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrator</div>
                <!-- <div class="email">john.doe@example.com</div> -->
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#smallModal"><i class="material-icons">person</i>Profile</a></li>
                        <li><a href="<?= base_url() ?>Login/logout"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MENU</li>
                <li class="<?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>Admin">
                        <i class="material-icons">home</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'background' ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>Admin/background">
                        <i class="material-icons">photo</i>
                        <span>Background</span>
                    </a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'statusInfo' ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>Admin/statusInfo">
                    <i class="material-icons">info</i>
                        <span>Status Info</span>
                    </a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'runningText' ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>Admin/runningText">
                        <i class="material-icons">text_format</i>
                        <span>Running Text</span>
                    </a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'penerbangan' || $this->uri->segment(2) == 'tambahPenerbangan' || $this->uri->segment(2) == 'TampilEditPenerbangan' || $this->uri->segment(2) == 'EditPenerbangan' ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>Admin/penerbangan">
                        <i class="material-icons">airplanemode_active</i>
                        <span>Penerbangan</span>
                    </a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'kota' || $this->uri->segment(2) == 'TambahKota' || $this->uri->segment(2) == 'EditKota' ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>Admin/kota">
                        <i class="material-icons">location_city</i>
                        <span>Kota</span>
                    </a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'keberangkatan' || $this->uri->segment(2) == 'TambahKeberangkatan' || $this->uri->segment(2) == 'tampilEditKeberangkatan' || $this->uri->segment(2) == 'EditKeberangkatan' || $this->uri->segment(2) == 'DeleteKeberangkatan' ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>Admin/keberangkatan">
                        <i class="material-icons">flight_takeoff</i>
                        <span>Keberangkatan</span>
                    </a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'kedatangan' || $this->uri->segment(2) == 'TambahKedatangan' || $this->uri->segment(2) == 'TampilEditKedatangan' || $this->uri->segment(2) == 'EditKedatangan' || $this->uri->segment(2) == 'DeleteKedatangan' ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>Admin/kedatangan">
                        <i class="material-icons">flight_land</i>
                        <span>Kedatangan</span>
                    </a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'Iklan'  ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>Admin/Iklan">
                        <i class="material-icons">videocam</i>
                        <span>Iklan</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <!-- #END# Right Sidebar -->
</section>
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">Change Password</h4>
            </div>
            <div class="modal-body">
                <div class="body">
                    <form action="<?= base_url() ?>Admin/updateProfil" method="post" enctype="multipart/form-data">
                        <div class="body">
                            <div id="add" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="gol">New Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" name="password1" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div id="add" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="gol">Confirm Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" name="password2" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div> -->
        </div>
    </div>
</div>
