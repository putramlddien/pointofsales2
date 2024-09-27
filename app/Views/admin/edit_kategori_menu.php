<h1>Edit Kategori</h1>
<form method="post" action="/kategori_menu/edit/<?= $kategori['id_kategori'] ?>">
    <label>Nama Kategori</label>
    <input type="text" name="nama_kategori" value="<?= esc($kategori['nama_kategori']) ?>" required>
    <button type="submit">Update</button>
</form>