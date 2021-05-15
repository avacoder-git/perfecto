
<?php
$students = Comment::find_all();


foreach ($students as $student):

    ?>


    <div class="modal fade students bd-example-modal-lg" id="student_<?php echo $student->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <?php echo $student->link ?>
                </div>
            </div>
        </div>
    </div>

<?php
endforeach;
?>