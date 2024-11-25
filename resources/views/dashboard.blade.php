<x-app-layout>
    <div class="flex mt-[9vh]">
        <div >
            @include('layouts.sidebar')
        </div>
        <div class="ms-[250px] flex flex-col">
            <div class="bg-gray-100 px-4 py-12 font-sans">
                <div class="max-w-4xl max-sm:max-w-sm mx-auto">
                    <h2 class="text-[#ff6d2f] text-4xl max-sm:text-2xl font-extrabold mb-8">Application Metrics</h2>
                    <div class="grid md:grid-cols-4 sm:grid-cols-2 gap-5">
                        <div class="bg-[#1f1f1f] rounded-xl border px-7 py-8">
                            <p class="text-white text-base font-semibold mb-1">Total Members</p>
                            <h3 class="text-[#ff6d2f] text-3xl font-extrabold">{{ $users }}</h3>
                        </div>
                        <div class="bg-[#1f1f1f] rounded-xl border px-7 py-8">
                            <p class="text-white text-base font-semibold mb-1">Total Trainers</p>
                            <h3 class="text-[#ff6d2f] text-3xl font-extrabold">{{ $trainers }}</h3>
                        </div>
                        <div class="bg-[#1f1f1f] rounded-xl border px-7 py-8">
                            <p class="text-white text-base font-semibold mb-1">Trainers Request</p>
                            <h3 class="text-[#ff6d2f] text-3xl font-extrabold">{{ $trainers_request }}</h3>
                        </div>
                        <div class="bg-[#1f1f1f] rounded-xl border px-7 py-8">
                            <p class="text-white text-base font-semibold mb-1">Total Sessions</p>
                            <h3 class="text-[#ff6d2f] text-3xl font-extrabold">{{ $sessions }}</h3>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="ms-[250px] w-[50vw] p-2">
            <h1></h1>
            <canvas id="sessionChart" width="" height=""></canvas>
        </div>
    </div>
    <script>
    // Get your session data (example dataset)
    const sessionData = [10, 15, 8, 20, 25, 18, 30]; // Example session counts
    const sessionLabels = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']; // Example days

    // Chart configuration
    const ctx = document.getElementById('sessionChart').getContext('2d');
    const sessionChart = new Chart(ctx, {
        type: 'line', // Type of chart
        data: {
            labels: sessionLabels, // X-axis labels
            datasets: [{
                label: 'Sessions', // Legend label
                data: sessionData, // Y-axis data
                backgroundColor: "#fff", // Background color of line fill
                borderColor: '#ff6d2f', // Line color
                borderWidth: 2, // Line thickness
                pointBackgroundColor: '#1f1f1f', // Point color
                pointBorderColor: '#1f1f1f', // Border color for points
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true, // Show legend
                    position: 'top'
                }
            },
            scales: {
                x: {
                    beginAtZero: false // Customize as needed
                },
                y: {
                    beginAtZero: true // Y-axis starts from 0
                }
            }
        }
    });
</script>

</x-app-layout>
