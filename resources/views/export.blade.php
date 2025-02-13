
  <form action="{{ route('export') }}" method="POST" enctype="multipart/form-data">
    @csrf
 <div>choisir le module </div>
    <div>
      <select name="model_type" id="model_type">
          <option value="1">User</option>
          <option value="2">Contact</option>
          <option value="3">Entreprise</option>
      </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Exporte</button>
</form>  
