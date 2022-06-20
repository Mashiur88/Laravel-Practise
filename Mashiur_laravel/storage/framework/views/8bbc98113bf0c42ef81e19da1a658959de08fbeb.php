
<?php $__env->startSection('content'); ?>
<div class="container">
<style>
    table,tr
    {
        border: 2px solid red;
        border-collapse: collapse;
        margin: auto;
        width: 50%;
    }
    td,th
    {
        border: 2px solid red;
        padding: 10px;
    }
</style>
<table id="showData">
    <tr>
        <th>DivisionName</th>
        <th>DistrictName</th>
        <th>Thana</th>
        <th>Id</th>
        <th>FullName</th>
    </tr>
    <?php
    $divrowSpan = $disrowSpan = $throwSpan = array();
    $a = $b = $c = "";
    $x = $y = $z = 0;
    ?>
    <?php $__currentLoopData = $Aarray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($i == 0): ?> 
            <?php
            $a = $value['divName'];
            $Aarray[$i]['Dprint'] = 'y';
            $divrowSpan[$x] = !empty($divrowSpan[$x]) ? $divrowSpan[$x] : 0;
            $divrowSpan[$x] += 1;
            ?>
        <?php elseif($value['divName'] === $a): ?>
            <?php
            $divrowSpan[$x] = !empty($divrowSpan[$x]) ? $divrowSpan[$x] : 0;
            $divrowSpan[$x] ++;
            $Aarray[$i]['Dprint'] = 'n';
            ?>
        <?php else: ?>
            <?php
            $Aarray[$i]['Dprint'] = 'y';
            $x++;
            $divrowSpan[$x] = !empty($divrowSpan[$x]) ? $divrowSpan[$x] : 0;
            $divrowSpan[$x] ++;
            $a = $value['divName'];
            ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    


    <?php $__currentLoopData = $Aarray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($i == 0): ?>
            <?php
            $b = $value['disName'];
            $Aarray[$i]['Sprint'] = 'y';
            $disrowSpan[$y] = !empty($disrowSpan[$y]) ? $disrowSpan[$y] : 0;
            $disrowSpan[$y] ++;
            ?>
        <?php elseif($value['disName'] === $b): ?>
            <?php
            $disrowSpan[$y] = !empty($disrowSpan[$y]) ? $disrowSpan[$y] : 0;
            $disrowSpan[$y] ++;
            $Aarray[$i]['Sprint'] = 'n';
            ?>
        <?php else: ?>
            <?php
            $Aarray[$i]['Sprint'] = 'y';
            $y++;
            $disrowSpan[$y] = !empty($disrowSpan[$y]) ? $disrowSpan[$y] : 0;
            $disrowSpan[$y] ++;
            $b = $value['disName'];
            ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <?php $__currentLoopData = $Aarray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <?php if($i == 0): ?>
            <?php
            $c = $value['tName'];
            $Aarray[$i]['Tprint'] = 'y';
            $throwSpan[$z] = !empty($throwSpan[$z]) ? $throwSpan[$z] : 0;
            $throwSpan[$z] ++;
            ?>
        <?php elseif($value['tName'] === $c): ?>
            <?php
            $throwSpan[$z] = !empty($throwSpan[$z]) ? $throwSpan[$z] : 0;
            $throwSpan[$z] ++;
            $Aarray[$i]['Tprint'] = 'n';
            ?>
        <?php else: ?>
            <?php
            $Aarray[$i]['Tprint'] = 'y';
            $z++;
            $throwSpan[$z] = !empty($throwSpan[$z]) ? $throwSpan[$z] : 0;
            $throwSpan[$z] ++;
            $c = $value['tName'];
            ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <?php $index = $index1 = $index2 = 0; ?>

    <?php $__currentLoopData = $Aarray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $value['fullname'] = $value['first_name']." ".$value['last_name']; ?>
        <tr>                    
            <?php if($value['Dprint'] === 'y'): ?>                        
                <td rowspan="<?php echo $divrowSpan[$index] ?>"><?php echo e($value['divName']); ?></td>                        
                <?php if($value['Sprint'] === 'y'): ?>                            
                    <td rowspan="<?php echo $disrowSpan[$index1] ?>"><?php echo $value['disName']; ?></td>                            
                    <?php if($value['Tprint'] === 'y'): ?>                                
                        <td rowspan="<?php echo $throwSpan[$index2] ?>"><?php echo $value['tName']; ?></td>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['fullname']; ?></td>
                        <?php
                            $index2++;
                        ?>
                    <?php else: ?>                                
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['fullname']; ?></td> 
                    <?php endif; ?>
                    <?php
                        $index1++;
                    ?>
                <?php else: ?>
                    <?php if($value['Tprint'] === 'y'): ?>
                        <td rowspan="<?php echo $throwSpan[$index2] ?>"><?php echo $value['tName']; ?></td>
                        <td><?php echo e($value['id']); ?></td>
                        <td><?php echo e($value['fullname']); ?></td>
                        <?php
                            $index2++;
                        ?>
                    <?php else: ?>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['fullname']; ?></td>                                
                    <?php endif; ?>                            
                <?php endif; ?> 
                <?php
                    $index++;
                ?>
            <?php else: ?>                       
                <?php if($value['Sprint'] === 'y'): ?>                            
                    <td rowspan="<?php echo $disrowSpan[$index1] ?>"><?php echo $value['disName']; ?></td>                            
                    <?php if($value['Tprint'] === 'y'): ?>                            
                        <td rowspan="<?php echo $throwSpan[$index2] ?>"><?php echo $value['tName']; ?></td>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['fullname']; ?></td>
                        <?php
                            $index2++;
                        ?>
                    <?php else: ?>                                
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['fullname']; ?></td>                              
                    <?php endif; ?>

                    <?php
                        $index1++;
                    ?>
                <?php else: ?>
                    <?php if($value['Tprint'] === 'y'): ?>                                
                        <td rowspan='<?php echo $throwSpan[$index2]; ?>'><?php echo $value['tName']; ?></td>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['fullname']; ?></td>
                        <?php
                        $index2++;
                        ?>
                    <?php else: ?>                               
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['fullname']; ?></td>                               
                    <?php endif; ?>

               <?php endif; ?> 
            <?php endif; ?>    

        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp 7.4.1\htdocs\Swapnoloke_Mashiur\Laravel-Practise\Mashiur_laravel\resources\views/Array/arrayShow.blade.php ENDPATH**/ ?>