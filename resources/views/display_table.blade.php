
<form action="" method="POST">
    @csrf
    <input type="hidden" name="action" value="import">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered table-sm" style="color: aliceblue">
                <thead>
                
                    <tr style="color: black">
                        @foreach ($fillable as $f)
                        <td>{{ $f }}</td>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($data as $row)
                    
                        <tr style="color:black">
                            @for ($i=0;$i<=count($row)-1;$i++)
                                    <td>{{ $row[$i] }}</td>
                            @endfor  
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
    {{-- <button type="submit" class="btn btn-primary mt-3" >Importer</button> --}}
</form>
