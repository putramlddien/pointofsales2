<h1>Kategori Menu (Customer)</h1>

<?php if (session()->getFlashdata('success')): ?>
    <p><?= session()->getFlashdata('success') ?></p>
<?php endif; ?>

<table>
    <thead>
        <tr>
            <th>Nama Kategori</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kategori as $k): ?>
            <tr>
                <td><?= esc($k['nama_kategori']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>