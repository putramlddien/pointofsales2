<h1>Kategori Menu (Admin/Chef)</h1>
<a href="/kategori_menu/create">Tambah Kategori</a>

<?php if (session()->getFlashdata('success')): ?>
    <p><?= session()->getFlashdata('success') ?></p>
<?php endif; ?>

<table>
    <thead>
        <tr>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kategori as $k): ?>
            <tr>
                <td><?= esc($k['nama_kategori']) ?></td>
                <td>
                    <a href="/kategori_menu/edit/<?= $k['id_kategori'] ?>">Edit</a>
                    <a href="/kategori_menu/delete/<?= $k['id_kategori'] ?>" onclick="return confirm('Hapus kategori ini?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>