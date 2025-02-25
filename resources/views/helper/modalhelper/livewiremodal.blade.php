<script type="text/javascript">
    // CREATE
    window.livewire.on('closemodal', () => {
        $('#createoreditModal').modal('hide');
    });
    // EDIT
    window.livewire.on('editmodal', () => {
        var myModal = new bootstrap.Modal(document.getElementById('createoreditModal'))
        myModal.show();
    });
    // SHOW
    window.livewire.on('showmodal', () => {
        var myModal = new bootstrap.Modal(document.getElementById('showModal'))
        myModal.show();
    });
    // CLOSE RESET
    var myModal = document.getElementById('createoreditModal')
    myModal.addEventListener('hidden.bs.modal', () => window.livewire.emit('formreset'))
</script>
