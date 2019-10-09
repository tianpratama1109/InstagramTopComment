                        <li><a href="/"><i class="ti-home"></i> <span>Dashboard </span></a></li>
                        <?php if ($level == "Admin") { ?>
                        <li class="treeview">
                        <a href="#">
                      <i class="mdi mdi-settings-box"></i>
                      <span>Admin Menu</span>
                      <span class="pull-right-container">
                        <i class="mdi mdi-plus pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                                <li><a href="?reseller=user_add">Tambah User</a>
                                </li>
                                <li><a href="?reseller=transfer">Transfer Saldo</a>
                                </li>
                    </ul>
                  </li>
<? } else if ($level == "CEO"){ ?>
                        <li class="treeview">
                        <a href="#">
                      <i class="mdi mdi-settings-box"></i>
                      <span>Developer Menu</span>
                      <span class="pull-right-container">
                        <i class="mdi mdi-plus pull-right"></i>
                      </span>
                    </a>
                                      <ul class="treeview-menu">
                                <li><a href="?admin=refund"><i class="fa fa-credit-card"></i> Refund Manager</a>
                                </li>
                                <li><a href="?admin=service"><i class="ion-pricetag"></i> Layanan Manager</a>
                                </li>
                                <li><a href="?admin=order"><i class="fa fa-shopping-bag"></i> Order Manager</a>
                                </li>
                                <li><a href="?admin=user"><i class="mdi mdi-account-check"></i> User Manager</a>
                                </li>
                                <li><a href="?reseller=user_add"><i class="mdi mdi-account-plus"></i> Tambah User</a>
                                </li>
                                <li><a href="?reseller=transfer"><i class="fa fa-money"></i>Transfer Saldo</a>
                                </li>
                    </ul>
                  </li>

<? } else if ($level == "Reseller"){ ?>
                        <li class="treeview">
                        <a href="#">
                      <i class="mdi mdi-settings-box"></i>
                      <span>Reseller Menu</span>
                      <span class="pull-right-container">
                        <i class="mdi mdi-plus pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                                <li><a href="?reseller=user_add">Tambah User</a>
                                </li>
                                <li><a href="?reseller=transfer">Transfer Saldo</a>
                                </li>
                    </ul>
                  </li>
<? } else if ($level == "Agen"){ ?>
                        <li class="treeview">
                        <a href="#">
                      <i class="mdi mdi-settings-box"></i>
                      <span>Agen Menu</span>
                      <span class="pull-right-container">
                        <i class="mdi mdi-plus pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                                <li><a href="?reseller=user_add">Tambah User</a>
                                </li>
                    </ul>
                  </li>
<?php } ?>
                        <li class="treeview">
                        <a href="#">
                      <i class="fa fa-shopping-cart"></i>
                      <span>Pembelian Baru</span>
                      <span class="pull-right-container">
                        <i class="mdi mdi-plus pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="?content=order"><i class="mdi mdi-instagram"></i> <span>Pembelian</span></a></li>
                        <li><a href="?content=history"><i class="glyphicon glyphicon-time"></i> <span>Riwayat Pembelian</span></a></li>
                    </ul>
                  </li>
                        
                        
                        
                        <li><a href="?content=service-list"><i class="mdi mdi-tag-multiple"></i> <span>Layanan</span></a></li>
                        <li><a href="?content=change-password"><i class="mdi mdi-lock"></i> <span>Ganti Password</span></a></li>
                        <li><a href="?content=tos"><i class="mdi mdi-information"></i> <span>TOS</span></a></li>