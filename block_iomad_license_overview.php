<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

class block_iomad_license_overview extends block_base {
    public function init() {
        $this->title = get_string('pluginname', 'block_iomad_license_overview');
    }

    public function hide_header() {
        return false;
    }

    public function applicable_formats() {
        return array('all' => true);
    }

    public function get_content() {
        global $USER, $CFG, $DB, $OUTPUT;

        // Only display if you have the correct capability.
        if (!iomad::has_capability('block/iomad_license_overview:view', context_system::instance())) {
            return;
        }

        if ($this->content !== null) {
            return $this->content;
        }

        $strlink = get_string('link', 'block_iomad_license_overview');
        $this->content = new stdClass;
		$this->content->text = "<center>Select your license drop box<br />
								you have X out X units left on this license</center>";
        
        $this->content->footer = '';

        return $this->content;
    }
}
