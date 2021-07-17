

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Task Info</h4>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" method="post" action="<?php echo e(route('task.edit', $task->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="taskTitle" name="taskTitle"
                                            value="<?php echo e($task->title); ?>">
                                    </div>

                                </div>

                                <hr class="mb-4">
                                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Edit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
            <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\storexWeb\pusty\resources\views/editTask.blade.php ENDPATH**/ ?>