<?php
namespace App\Traits;

use App\Models\Voice;
use App\Enum\VoiceTypeEnum;

trait HasVoices {
    public function voices() {
        return $this->morphMany(Voice::class, 'voiceable');
    }

    public function plusVoices() {
        return$this->voices()->where('type', VoiceTypeEnum::PLUS);
    }

    public function minusVoices() {
        return$this->voices()->where('type', VoiceTypeEnum::MINUS);
    }
}
