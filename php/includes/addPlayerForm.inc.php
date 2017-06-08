<h1>Enregistrer un joueur</h1>
<div class="container">
    <form method="POST">
    <div class="row">
        <div class="col-md-4">
            <label>Nom</label>
            <input type="text" name="nom">
        </div>
        <div class="col-md-4">
            <label>Prenom</label>
            <input type="text" name="prenom">
        </div>
        <div class="col-md-4">
            <label>Age</label>
            <input type="text" name="age">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Numero maillot</label>
            <!-- <input type="text" name="numero_maillot"> -->
            <select name="numero_maillot">
                <?php
                    for ($i=1; $i < 1000; $i++) {
                        echo '<option value="'.$i.'">'. $i.'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col-md-6">
            <label>Équipe</label>
            <!-- <input type="text" name="numero_maillot"> -->
            <?php
                echo selectFormat(getTeams()); 
            ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <input type="submit" name="input" value="Enregistrer">
        </div>
    </div>

    </form>
</div>