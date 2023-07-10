@extends('admin.admin')
@section('title', 'Ajouter des équipements à un événement')
@include('layouts.navbar')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.min.css" rel="stylesheet">

    <h1>Ajouter des équipements à un événement</h1>
    <br>
    <h3>{{ $event->name }}</h3>
    <form method="POST" action="{{ route('storeEquipementToEvent', ['event_id' => $event->id]) }}">
        @csrf
        <select id="equipments-select" name="equipements[]" multiple>
        </select>
        <br>
        <button class="btn btn-success" type="submit">Valider</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <script>
        var equipements = <?php echo json_encode($equipements); ?>;
        var equipementsDejaAjoutes = <?php echo json_encode($equipementDejaAjoute); ?>;

        var select = new TomSelect('#equipments-select', {
            valueField: 'id',
            labelField: 'name',
            searchField: 'name',
            options: equipements,
            plugins: ['remove_button']
        });

        var selectedEquipements = equipementsDejaAjoutes.map(function(equipement) {
            return equipement.rental_equipement_id;
        });

        select.setValue(selectedEquipements);
    </script>
@endsection
@include('layouts.footer')
