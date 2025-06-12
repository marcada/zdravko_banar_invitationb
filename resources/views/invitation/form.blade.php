<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Generate Invitation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body class="bg-light py-5">

<div class="container d-flex justify-content-center align-items-center">
    <div class="col-6">
        <h2 class="mb-4 text-center">Generate Festival Invitation</h2>

        <form method="POST" action="{{ route('invitation.generate') }}" class="card p-4 shadow">
            @csrf

            <div class="mb-3">
                <label for="language" class="form-label">Language:</label>
                <select name="language" id="language" class="form-select" required>
                    <option value="">-- Choose Language --</option>
                    <option value="en">English</option>
                    <option value="mk">Macedonian</option>
                    <option value="sr">Serbian/Croatian</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="festival_name" class="form-label">Choose Festival:</label>
                <select id="festival_name" class="form-select" required>
                    <option value="">-- Select Festival --</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="festival_id" class="form-label">Choose Date:</label>
                <select name="festival_id" id="festival_id" class="form-select" required disabled>
                    <option value="">-- Select Date --</option>
                    <option value="custom">Other / Custom Dates</option>
                </select>
            </div>

            <div class="mb-3 d-none" id="customDateGroup">
                <label for="custom_date" class="form-label">Select Custom Date Range:</label>
                <input type="text" name="custom_date" id="custom_date" class="form-control" placeholder="Select date range" autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="ensemble" class="form-label">Ensemble Name:</label>
                <input type="text" name="ensemble" id="ensemble" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="director" class="form-label">Director (optional):</label>
                <input type="text" name="director" id="director" class="form-control">
            </div>

            <div class="mb-3">
                <label for="leader" class="form-label">Leader (optional):</label>
                <input type="text" name="leader" id="leader" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">Generate PDF</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    const festivals = @json($festivals);

    const languageSelect = document.getElementById('language');
    const festivalNameSelect = document.getElementById('festival_name');
    const festivalIdSelect = document.getElementById('festival_id');
    const customDateGroup = document.getElementById('customDateGroup');

    languageSelect.addEventListener('change', function () {
        const lang = this.value;
        festivalNameSelect.innerHTML = '<option value="">-- Select Festival --</option>';
        const uniqueNames = {};

        festivals.forEach(f => {
            const label = f[`name_${lang}`];
            if (!uniqueNames[label]) uniqueNames[label] = [];
            uniqueNames[label].push(f);
        });

        Object.keys(uniqueNames).forEach(label => {
            const option = new Option(label, label);
            festivalNameSelect.add(option);
        });

        festivalIdSelect.innerHTML = '<option value="">-- Select Date --</option>';
        festivalIdSelect.disabled = true;
    });

    festivalNameSelect.addEventListener('change', function () {
        const lang = languageSelect.value;
        const selected = festivals.filter(f => f[`name_${lang}`] === this.value);

        festivalIdSelect.innerHTML = '<option value="">-- Select Date --</option>';
        selected.forEach(f => {
            const opt = new Option(`${formatDate(f.start_date)} – ${formatDate(f.end_date, true)}`, f.id);
            festivalIdSelect.add(opt);
        });

        festivalIdSelect.add(new Option('Other / Custom Dates', 'custom'));
        festivalIdSelect.disabled = false;
    });

    festivalIdSelect.addEventListener('change', function () {
        customDateGroup.classList.toggle('d-none', this.value !== 'custom');
    });

    flatpickr("#custom_date", {
        mode: "range",
        dateFormat: "d M Y"
    });

    function formatDate(dateStr, year = false) {
        const date = new Date(dateStr);
        return date.toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: year ? 'numeric' : undefined }).replace(',', '');
    }
</script>

</body>
</html>
