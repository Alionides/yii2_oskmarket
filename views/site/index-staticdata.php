<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
    <button class="btn btn-success test">Test</button>
    <table id="table" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>City</th>                
                <th>Action</th>                
            </tr>
        </thead>
        <tbody class="alldata">
            <?php foreach($users as $u){ ?>
                <tr>                
                    <td><?php echo $u->name; ?></td>
                    <td><?php echo $u->city->name; ?></td>
                    <td><button class="btn btn-danger">del</button></td>                              
                </tr>      
            <?php } ?>       
        </tbody>        
    </table>

