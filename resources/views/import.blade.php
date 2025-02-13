
<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
    <div>
        <select name="model_type" id="model_type">
            <option value="1">User</option>
            <option value="2">Contact</option>
            <option value="3">Entreprise</option>
        </select>
    </div>
 
    <div class="form-group">
        <label for="file">Téléchargez un fichier Excel (CSV, XLSX)</label>
        <input type="file" class="form-control" name="file" id="file" required>
    </div>
    <button type="submit" id="show" value="show" name="show" class="btn btn-primary" onclick="setAction('show')"> show </button>
    <button type="submit" id="import" value="import" name="import" class="btn btn-primary" onclick="setAction('import')"> import </button>
   
</form>

<script>
    
    function setAction(action) {
        document.getElementById('action').value = action;
    }
</script>