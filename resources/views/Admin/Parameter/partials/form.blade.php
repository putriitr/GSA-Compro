<div class="form-group">
    <label for="nama_perusahaan">Nama Perusahaan</label>
    <input type="text" name="nama_perusahaan" class="form-control"
        value="{{ old('nama_perusahaan', $companyParameter->nama_perusahaan ?? '') }}" required>
</div>

<div class="form-group">
    <label for="sejarah_singkat">Sejarah Singkat</label>
    <textarea name="sejarah_singkat" class="form-control">{{ old('sejarah_singkat', $companyParameter->sejarah_singkat ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="alamat">Alamat</label>
    <textarea name="alamat" class="form-control" required>{{ old('alamat', $companyParameter->alamat ?? '') }}</textarea>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="whatsapp_1">WhatsApp 1</label>
            <input type="text" class="form-control" id="whatsapp_1" name="whatsapp_1"
                value="{{ old('whatsapp_1', $companyParameter->whatsapp_1 ?? '') }}">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="whatsapp_2">WhatsApp 2</label>
            <input type="text" class="form-control" id="whatsapp_2" name="whatsapp_2"
                value="{{ old('whatsapp_2', $companyParameter->whatsapp_2 ?? '') }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="visimisi_1">Visi 1</label>
            <textarea class="form-control" id="visimisi_1" name="visimisi_1">{{ old('visimisi_1', $companyParameter->visimisi_1 ?? '') }}</textarea>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="visimisi_2">Visi 2</label>
            <textarea class="form-control" id="visimisi_2" name="visimisi_2">{{ old('visimisi_2', $companyParameter->visimisi_2 ?? '') }}</textarea>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="visimisi_3">Visi 3</label>
            <textarea class="form-control" id="visimisi_3" name="visimisi_3">{{ old('visimisi_3', $companyParameter->visimisi_3 ?? '') }}</textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nomor_induk_berusaha">Nomor Induk Berusaha (NIB)</label>
            <input type="text" class="form-control" id="nomor_induk_berusaha" name="nomor_induk_berusaha"
                value="{{ old('nomor_induk_berusaha', $companyParameter->nomor_induk_berusaha ?? '') }}">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="surat_keterangan">Surat Keterangan (SK)</label>
            <input type="text" class="form-control" id="surat_keterangan" name="surat_keterangan"
                value="{{ old('surat_keterangan', $companyParameter->surat_keterangan ?? '') }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control"
                value="{{ old('email', $companyParameter->email ?? '') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="maps">URL Lokasi</label>
            <input type="text" name="maps" class="form-control"
                value="{{ old('maps', $companyParameter->maps ?? '') }}">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="website">Website</label>
    <input type="url" name="website" class="form-control"
        value="{{ old('website', $companyParameter->website ?? '') }}">
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="instagram">Instagram</label>
            <input type="text" name="instagram" class="form-control"
                value="{{ old('instagram', $companyParameter->instagram ?? '') }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="linkedin">LinkedIn</label>
            <input type="text" name="linkedin" class="form-control"
                value="{{ old('linkedin', $companyParameter->linkedin ?? '') }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="ekatalog">Link E-Katalog</label>
            <input type="text" name="ekatalog" class="form-control"
                value="{{ old('ekatalog', $companyParameter->ekatalog ?? '') }}">
        </div>
    </div>
</div>
