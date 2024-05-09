<?php

namespace App\Livewire;

use App\Models\Centre;
use Livewire\Component;
use App\Models\Appointment;
use App\Models\WeeklyAvailability;

class DoctorAvailabilities extends Component
{
    public $doctor;
    public $centers;
    public $availableDays = [];

    public function mount($doctor)
    {
        $this->doctor = $doctor;
        $this->centers = Centre::all();
        $this->calculateAvailableDays();
    }

    public function calculateAvailableDays()
    {
        // Initialize an array to store available dates grouped by center
        $this->availableDays = [];

        // Get the current date
        $currentDate = now();

        $availableSlots = 0;

        // Loop through the next 15 days
        for ($i = 0; $i < 15; $i++) {
            // Calculate the date
            $date = $currentDate->copy()->addDay($i);
            
            // Check if the doctor is available on this day
            $availability = WeeklyAvailability::where('member_id', $this->doctor->id)
                ->where('day', strtolower($date->format('l'))) // Convert day to lowercase for comparison
                ->first();

            if ($availability) {
                $totalSlots = $availability->slots;

                $existingAppointments = Appointment::where('member_id', $this->doctor->id)
                ->whereDate('appointment_date', $date)
                ->count();

                $availableSlots = max(0, $totalSlots - $existingAppointments);
            }

            if ($availability) {
                // If the doctor is available, group the date by center
                $centerId = $availability->center_id;

                if (!isset($this->availableDays[$centerId])) {
                    $this->availableDays[$centerId] = [];
                }

                $this->availableDays[$centerId][$date->format('Y-m-d')] = $availableSlots;
            }
        }
    }

    public function render()
    {
        return view('livewire.doctor-availabilities', [
            'centers' => $this->centers,
            'availableDays' => $this->availableDays,
            ''
        ]);
    }
}
