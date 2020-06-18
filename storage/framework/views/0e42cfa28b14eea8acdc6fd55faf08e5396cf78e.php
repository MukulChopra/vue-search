<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form enctype="multipart/form-data" method="post" role="form" action="/uploadtreatment">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="exampleInputFile">File Upload</label>
                    <input type="file" name="file" id="file" size="150">
                    <p class="help-block">Only Excel/CSV File Import.</p>
                </div>
                <button type="submit" class="btn btn-default" name="Import" value="Import">Upload</button>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\code-test\resources\views/treatment.blade.php ENDPATH**/ ?>