<form action="index.php?action=catController" method="post">
    <select name="catName" id="catnames">
        <?php foreach ($aCats as $key) : ?>
            <option value="<?php echo $key->name; ?>"><?php echo $key->name; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<div>
    <h2>Tout sur le : <?php echo $catInfo->name; ?></h2>
    <p><?php echo $catInfo->temperament; ?></p>
    <p><?php echo $catInfo->description; ?></p>
    <p><?php echo $catInfo->origin; ?></p>
    <img src="<?php echo $catInfo->image->url; ?>"  alt="">

</div>