<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Bobot
        $weights = [
            'quran' => 0.40,
            'pendapatan' => 0.05,
            'prestasi' => 0.30,
            'tes_masuk' => 0.15,
            'tes_iq' => 0.10,
        ];

        // Check if any score is null
        if (
            is_null($this->score_quran) ||
            is_null($this->score_pendapatan) ||
            is_null($this->score_prestasi) ||
            is_null($this->tes_masuk) ||
            is_null($this->tes_iq)
        ) {
            $score_akhir = 'Belum Lengkap';
            $status = 'Belum Lengkap';
        } else {
            // Check if any score is below 60
            if (
                $this->score_quran < 60 ||
                $this->score_pendapatan < 60 ||
                $this->score_prestasi < 60 ||
                $this->tes_masuk < 60 ||
                $this->tes_iq < 60
            ) {
                $status = 'Tidak Memenuhi';
                $score_akhir = round(
                    ($this->score_quran * $weights['quran']) +
                        ($this->score_pendapatan * $weights['pendapatan']) +
                        ($this->score_prestasi * $weights['prestasi']) +
                        ($this->tes_masuk * $weights['tes_masuk']) +
                        ($this->tes_iq * $weights['tes_iq'])
                    );
            } else {
                $score_akhir = round(
                ($this->score_quran * $weights['quran']) +
                    ($this->score_pendapatan * $weights['pendapatan']) +
                    ($this->score_prestasi * $weights['prestasi']) +
                    ($this->tes_masuk * $weights['tes_masuk']) +
                    ($this->tes_iq * $weights['tes_iq'])
                );

                if ($score_akhir >= 60) {
                    $status = 'Memenuhi Kriteria';
                } else {
                    $status = 'Tidak Memenuhi';
                }
            }
        }

        // Mengembalikan data siswa
        return [
            'id' => $this->id,
            'name' => $this->name,
            'birthplace'=> $this->birthplace,
            'birthdate' => $this->birthdate,
            'address' => $this->address,
            'phone' => $this->phone,
            'parent' => $this->parent,
            'parentjob' => $this->parentjob,
            'quran' => $this->quran,
            'pendapatan' => $this->pendapatan,
            'email' => $this->email,
            'user_id' => $this->user_id,
            'class' => ClassesResource::make($this->whenLoaded('class')),
            'section' => SectionResource::make($this->whenLoaded('section')),
            'created_at' => $this->created_at->toFormattedDateString(),
            'tes_iq' => $this->tes_iq,
            'tes_masuk' => $this->tes_masuk,
            'score_quran' => $this->score_quran,
            'score_pendapatan' => $this->score_pendapatan,
            'score_prestasi' => $this->score_prestasi,
            'score_akhir' => $score_akhir, // Membulatkan hasil ke 2 desimal
            'kriteria'=> $status,
            'status' => $this->status,
        ];
    }
}
