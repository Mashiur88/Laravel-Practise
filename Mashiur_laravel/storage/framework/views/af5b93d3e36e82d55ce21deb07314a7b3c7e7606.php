

<?php $__env->startSection('content'); ?>

<div class="container-fluid p-0 m-0">

    <div class="container-fluid text-center bg-info">
        
        <form method="POST" action="<?php echo e(route('user.search')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="row mb-3">
                <div class="col-sm-3"></div>
                <div class="col-sm-4">
                    <input class="form-control" type="text" name="search" id="search" placeholder="type here">
                </div>
                <div class="col-sm-2">
                    <input class="form-control" type="submit" name="find" id="find" value="Search">
                </div>      
            </div>
        </form>
        <h3>User List</h3>
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>UserName</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Change status</th>
                    <td colspan="2"><b>Action</b></td>
                </tr>
            </thead>
            
            <?php if(count($users) > 0): ?>

                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($row["gender"] == 1): ?>
                        <?php $temp = "male"; ?>
                    <?php elseif($row["gender"] == 2): ?>
                        <?php $temp = "female"; ?>
                    <?php endif; ?>
                    <?php if($row["status"] == 0): ?> 
                        <?php $temp1 = "Inactive"; ?>
                    <?php elseif($row["status"] == 1): ?>              
                        <?php $temp1 = "Active"; ?>
                    <?php endif; ?>
                    <?php $id = $row['id'];
                    $stat = $row['status'];  ?>                  
                    <tr>
                        <td><?php echo e($row["first_name"]); ?></td>
                        <td><?php echo $row["last_name"] ?></td>
                        <td><?php echo $row["user_name"] ?></td>
                        <td><?php echo $temp ?></td>
                        <td>
                        <button type="button" class="btn btn-primary" onclick="getAddress(<?php echo $id; ?>)" data-bs-toggle="modal" data-bs-target="#myModal">
                            View Address
                        </button>
                        </td>
                        <td id='cxngstatus<?php echo $id; ?>'><?php echo $temp1 ?></td>
                        <td id='cxngstatusBtn<?php echo $id; ?>'><button class="btn btn-primary" onclick="changeStatus(<?php echo "$id,$stat"; ?>)"><?php echo($row['status'] == '1') ? 'Inactive' : 'Active'; ?></button></td>
                        <td><a href = 'updateUser.php?id=<?php echo $row["id"] ?>'><i class="fa-solid fa-pen"></i></a></td>
                        <td><a href = '../controller/actionDelete.php?id=<?php echo $row["id"] ?>'><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    <!-- Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog modal-fullscreen-sm-down">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Full Address</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body" id="modal-body">
                                        
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            <?php else: ?>            
                <?php echo "<td colspan = '6'> No Data Found </td>"; ?>           
            <?php endif; ?>
        </table>
 <!--       <div>
        <form method='POST'>
                <div class="row mb-3">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-4">
                        <select class="form-select" id='limit' name='limit'>
                            isset($limit)&& 
                            <option value=""<?php echo (isset($limit) && $limit == 2) ? 'selected' : ''; ?>>Default</option>
                            <option value="3"<?php echo (isset($limit) && $limit == 3) ? 'selected' : ''; ?>>3</option>
                            <option value="4" <?php echo (isset($limit) && $limit == 4) ? 'selected' : ''; ?>>4</option>
                            <option value="5" <?php echo (isset($limit) && $limit == 5) ? 'selected' : ''; ?>>5</option>
                            <option value="6" <?php echo (isset($limit) && $limit == 6) ? 'selected' : ''; ?>>6</option>
                            <option value="10" <?php echo (isset($limit) && $limit == 10) ? 'selected' : ''; ?>>10</option>
                            <option value="11" <?php echo (isset($limit) && $limit == 11) ? 'selected' : ''; ?>>11</option>
                            <option value="12" <?php echo (isset($limit) && $limit == 12) ? 'selected' : ''; ?>>12</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-control" type="submit" name="send" id="send" value="setlimit">
                    </div>
                </div>
            </form>   -->

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp 7.4.1\htdocs\Swapnoloke_Mashiur\Mashiur_laravel\resources\views/userlist.blade.php ENDPATH**/ ?>