<h1>Enregistrer une équipe</h1>

<!-- enctype="multipart/form-data" pour envoyer des fichiers -->
<div class="container">
    <form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
            <label>Nom</label>
            <input type="text" name="nom">
        </div>
        <div class="col-md-4">
            <label>Entraineur</label>
            <input type="text" name="entraineur">
        </div>
        <div class="col-md-4">
            <label>Couleurs</label>
            <input type="text" name="couleurs">
        </div>

        <div class="col-md-4">
            <label>Logo</label>
            <input type="file" name="logo">
        </div>
    </div>
    


    <div class="row">
        <div class="col-md-12">
            <input type="submit" name="input" value="Enregistrer">
        </div>
    </div>

    </form>
</div>