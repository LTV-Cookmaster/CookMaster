<?php
    use Carbon\Carbon;
    if ($event->exists) {
        $date_start = Carbon::createFromFormat('d-m-Y', $event->start_date);
        $formattedStartDate = $date_start->format('Y-m-d');
        $date_end = Carbon::createFromFormat('d-m-Y', $event->end_date);
        $formattedEndDate = $date_end->format('Y-m-d');
    } else {
        $formattedStartDate = '';
        $formattedEndDate = '';
    }
?>
<?php $__env->startSection('title', $event->exists ? "Éditer un évènement" : "Créer un évènement"); ?>
<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('content'); ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <h1><?php echo $__env->yieldContent('title'); ?></h1>

    <form class="vstack gap-2" id="form" action="<?php echo e($event->exists ? route('events.update', ['event' => $event]) : route('events.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field($event->exists ? 'put' : 'post'); ?>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <?php echo $__env->make('components.input', ['label' => 'Name', 'name' => 'name', 'value' => $event->name], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="mb-3">
                    <label for="type">Type</label>
                    <select class="form-select" name="type">
                        <?php $__currentLoopData = $eventsTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eventTypes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($eventTypes['name']); ?>" <?php echo e($event->type == $eventTypes['name'] ? 'selected' : ''); ?>>
                                <?php echo e($eventTypes['label']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="mb-3">
                    <?php echo $__env->make('components.input', ['label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'value' => $event->description], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="mb-3">
                    <label for="contractor_id">Contractor</label>
                    <select class="form-select" name="contractor_id">
                        <?php $__currentLoopData = $contractors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contractor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>)
                        <option value="<?php echo e($contractor->id); ?>" <?php echo e($event->contractor_id == $contractor->id ? 'selected' : ''); ?>><?php echo e($contractor->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="mb-3">
                    <?php echo $__env->make('components.input', ['label' => 'Price', 'name' => 'price', 'type' => 'number', 'value' => $event->price], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="mb-3">
                    <?php echo $__env->make('components.input', ['label' => 'Number of Participants', 'name' => 'number_of_participants', 'type' => 'number', 'value' => $event->number_of_participants], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="mb-3">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <?php echo $__env->make('components.input', ['label' => 'Start Date', 'name' => 'start_date', 'type' => 'date', 'value' => $formattedStartDate], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="mb-3" id="end-date-container" style="<?php echo e(($_SERVER['REQUEST_METHOD'] == 'put') ? 'display:block' : 'display:none'); ?>">
                <?php echo $__env->make('components.input', ['label' => 'End Date', 'name' => 'end_date', 'type' => 'date', 'value' => $formattedEndDate], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="mb-3" id="start-time-container" style="<?php echo e(($_SERVER['REQUEST_METHOD'] == 'put') ? 'display:block' : 'display:none'); ?>">
                    <?php echo $__env->make('components.input', ['label' => 'Start Time', 'name' => 'start_time', 'type' => 'time', 'value' => $event->start_time], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="mb-3" id="end-time-container" style="<?php echo e(($_SERVER['REQUEST_METHOD'] == 'put') ? 'display:block' : 'display:none'); ?>">
                    <?php echo $__env->make('components.input', ['label' => 'End Time', 'name' => 'end_time', 'type' => 'time', 'value' => $event->end_time], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="mb-3" id="office-container" style="<?php echo e(($_SERVER['REQUEST_METHOD'] == 'put') ? 'display:block' : 'display:none'); ?>">
                    <select class="form-select" name="office_id" id="office-select">
                        <option value="default">Select an office</option>
                        <?php $__currentLoopData = $offices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($office->id); ?>" <?php echo e($event->office_id == $office->id ? 'selected' : ''); ?>><?php echo e($office->name); ?> | <?php echo e($office->postal_code); ?> | <?php echo e($office->address); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <p id="loading" style="display: none">Loading...</p>

                <div class="mb-3" id="room-select-wrapper" style="display: none;">
                    <select class="form-select" name="room" id="room-select">

                    </select>
                </div>

                <script>
                    var officeSelect = document.getElementById('office-select');
                    var roomSelectWrapper = document.getElementById('room-select-wrapper');
                    var roomSelect = document.getElementById('room-select');
                    var startDateInput = document.getElementById('start_date');
                    var endDateInput = document.getElementById('end_date');
                    var startTimeInput = document.getElementById('start_time');
                    var endTimeInput = document.getElementById('end_time');
                    var loading = document.getElementById('loading');

                    function formatDate(originalDate) {
                        let parts = originalDate.split("-");
                        return `${parts[2]}-${parts[1]}-${parts[0]}`;
                    }

                    officeSelect.addEventListener('change', function() {
                        var selectedOfficeId = officeSelect.value;

                        if (selectedOfficeId === 'default') {
                            startDateInput.disabled = false;
                            endDateInput.disabled = false;
                            startTimeInput.disabled = false;
                            endTimeInput.disabled = false;
                            roomSelect.innerHTML = '';
                            roomSelectWrapper.style.display = 'none';
                        } else {
                            startDateInput.disabled = true;
                            endDateInput.disabled = true;
                            startTimeInput.disabled = true;
                            endTimeInput.disabled = true;
                            loading.style.display = 'block';
                            console.log(`/api/rooms/${selectedOfficeId}/${formatDate(startDateInput.value)}/${formatDate(endDateInput.value)}/${startTimeInput.value}/${endTimeInput.value}`);
                            fetch(`/api/rooms/${selectedOfficeId}/${formatDate(startDateInput.value)}/${formatDate(endDateInput.value)}/${startTimeInput.value}/${endTimeInput.value}`)
                                .then(response => response.json())
                                .then(data => {
                                    roomSelect.innerHTML = '';
                                    data.forEach(function (room) {
                                        var option = document.createElement('option');
                                        option.value = room.id;
                                        option.textContent = room.name + " | Capacité maximal: " + room.max_capacity + " | Disponible";
                                        roomSelect.appendChild(option);
                                    });

                                    roomSelectWrapper.style.display = 'block';
                                    loading.style.display = 'none';
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    loading.style.display = 'none';
                                });
                        }
                    });
                    document.getElementById('start_date').addEventListener('change', function() {
                        const endDateContainer = document.getElementById('end-date-container');
                        if (this.value !== '') {
                            endDateContainer.style.display = 'block';
                        } else {
                            endDateContainer.style.display = 'none';
                            document.getElementById('end_date').value = '';
                            document.getElementById('start-time-container').style.display = 'none';
                            document.getElementById('end-time-container').style.display = 'none';
                            document.getElementById('office-container').style.display = 'none';
                        }
                    });

                    document.getElementById('end_date').addEventListener('change', function() {
                        const startTimeContainer = document.getElementById('start-time-container');
                        if (this.value !== '') {
                            startTimeContainer.style.display = 'block';
                        } else {
                            startTimeContainer.style.display = 'none';
                            document.getElementById('start_time').value = '';
                            document.getElementById('end-time-container').style.display = 'none';
                            document.getElementById('office-container').style.display = 'none';
                        }
                    });

                    document.getElementById('start_time').addEventListener('change', function() {
                        const endTimeContainer = document.getElementById('end-time-container');
                        if (this.value !== '') {
                            endTimeContainer.style.display = 'block';
                        } else {
                            endTimeContainer.style.display = 'none';
                            document.getElementById('end_time').value = '';
                            document.getElementById('office-container').style.display = 'none';
                        }
                    });

                    document.getElementById('end_time').addEventListener('change', function() {
                        const officeContainer = document.getElementById('office-container');
                        if (this.value !== '') {
                            officeContainer.style.display = 'block';
                        } else {
                            officeContainer.style.display = 'none';
                        }
                    });
                    document.getElementById('form').addEventListener('submit', function(event) {
                        // Réactiver les champs de date et d'heure avant la soumission du formulaire
                        startDateInput.disabled = false;
                        endDateInput.disabled = false;
                        startTimeInput.disabled = false;
                        endTimeInput.disabled = false;
                    });
                </script>






            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div>
                    <button class="btn btn-primary">
                        <?php if($event->exists): ?>
                            Modifier
                        <?php else: ?>
                            Créer
                        <?php endif; ?>
                    </button>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/events/form.blade.php ENDPATH**/ ?>