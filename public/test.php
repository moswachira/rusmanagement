<?php
 
## +-----------------------------------------------------------------------+
## | 1. Creating & Calling:                                                |
## +-----------------------------------------------------------------------+
## *** define a relative (virtual) path to calendar.class.php file  
## *** and other files (relatively to the current file)
## *** RELATIVE PATH ONLY *** Ex.: "", "calendar/" or "../calendar/"
define("CALENDAR_DIR", "");                    
require_once(CALENDAR_DIR."inc/connection.inc.php");
require_once(CALENDAR_DIR."calendar.class.php");
 
## *** create calendar object
$objCalendar = new Calendar();
 
## +-----------------------------------------------------------------------+
## | 2. General Settings:                                                  |
## +-----------------------------------------------------------------------+
## +-- Submission Settings & Debug Mode -----------------------------------
## *** set PostBack method: "get" or "post"
$objCalendar->SetPostBackMethod("post");
$objCalendar->Debug(false);
 
## +-- Languages ----------------------------------------------------------
## *** set interface language (default - English)
$objCalendar->SetInterfaceLang("en");    
 
## +-- Week Settings ------------------------------------------------------
## *** set week day name length - "short" or "long"
$objCalendar->SetWeekDayNameLength("long");
## *** set start day of the week: from 1 (Sunday) to 7 (Saturday)
$objCalendar->SetWeekStartedDay("1");
## *** disable certain days of the week: from 1 (Sunday) to 7 (Saturday). Ex.: 1,2 or 7
/// $objCalendar->SetDisabledDays(6,7);
## *** define showing a week number of the year
$objCalendar->ShowWeekNumberOfYear(true);
 
 
## +-----------------------------------------------------------------------+
## | 3. Events & Categories Settings:                                      |
## +-----------------------------------------------------------------------+
## +-- Events Actions & Operations ----------------------------------------
## *** allow multiple occurrences for events in the same time slot: false|true - default
$objCalendar->SetEventsMultipleOccurrences(true);
## *** allow editing events in the past
/// $objCalendar->EditingEventsInPast(false);
## *** set (allow) calendar events operations
$objCalendar->SetEventsOperations(array(
   "add"=>true,
   "edit"=>true,
   "details"=>true,
   "delete"=>true,
   "delete_by_range"=>true,
   "manage"=>true
));
 
## +-- Categories Actions & Operations ------------------------------------
## *** set (allow) using categories
$objCalendar->AllowCategories(true);
## *** set calendar categories settings
$objCalendar->SetCategoriesOperations(array(
   "add"=>true,
   "edit"=>true,
   "details"=>true,
   "delete"=>true,
   "manage"=>true,
   "allow_colors"=>true,
   "show_filter"=>true
));
 
## +-- Locations Actions & Operations ------------------------------------
## *** set (allow) using locations
$objCalendar->AllowLocations(true);
## *** set calendar locations operations
$objCalendar->SetLocationsOperations(array(
   "add"=>true,
   "edit"=>true,
   "details"=>true,
   "delete"=>true,
   "manage"=>true,
   "allow_colors"=>true,
   "show_filter"=>true
));
 
## +-----------------------------------------------------------------------+
## | 4. Participants Settings:                                                  
## +-----------------------------------------------------------------------+
## +-- Participants Settings -----------------------------------------------------
## *** set participant ID (parameter must be a numeric value) who can access the events
/// $participant_id = 0;
/// $objCalendar->SetParticipantID($participant_id);    
## *** set (allow) calendar participants operations
$objCalendar->AllowParticipants(true);
## *** set participants settings
$objCalendar->SetParticipantsOperations(array(
   "add"=>true,
   "edit"=>true,
   "details"=>true,
   "delete"=>true,
   "manage"=>true,
   "assign_to_events"=>true
));
 
## +-----------------------------------------------------------------------+
## | 5. Time Settings and Formatting:                                      |
## +-----------------------------------------------------------------------+
## +-- TimeZone Settings --------------------------------------------------
## *** set timezone
## *** (list of supported Timezones - http://us3.php.net/manual/en/timezones.php)
$objCalendar->SetTimeZone("America/Los_Angeles");    
 
## +-- Time Format & Settings ----------------------------------------------
## *** define time format - 24|AM/PM
$objCalendar->SetTimeFormat("24");
## *** define allowed hours frame (from, to). Possible values: 0...24
$objCalendar->SetAllowedHours(0, 22);
## *** define time slot - 15|30|45|60 minutes
$objCalendar->SetTimeSlot("60");
## *** set showing times in Daily, Weekly and List views
$objCalendar->ShowTime("true");
 
## +-----------------------------------------------------------------------+
## | 6. Visual Settings:                                                   |
## +-----------------------------------------------------------------------+
## +-- Calendar Views -----------------------------------------------------
## *** set (allow) calendar Views
$objCalendar->SetCalendarViews(array(
   "daily"=>true,
   "weekly"=>true,
   "monthly"=>true,
   "monthly_double"=>true,
   "yearly"=>true,
   "list_view"=>true
));                        
## *** set default calendar view - "daily"|"weekly"|"monthly"|"yearly"|"list_view"|"monthly_small"|"monthly_double"
$objCalendar->SetDefaultView("monthly");    
 
## +-- Calendar Actions -----------------------------------------------------
## *** set (allow) calendar actions
$objCalendar->SetCalendarActions(array("statistics"=>true, "exporting"=>true, "printing"=>true));
 
## *** set CSS style: "green"|"brown"|"blue" - default
$objCalendar->SetCssStyle("blue");
## *** specify using of WYSIWYG editor
$objCalendar->AllowWYSIWYG(true);
## *** set calendar width and height
$objCalendar->SetCalendarDimensions("800px", "500px");
## *** set type of displaying for events
$events_display_type = array("daily"=>"block", "weekly"=>"tooltip", "monthly"=>"inline");
$objCalendar->SetEventsDisplayType($events_display_type);
## *** set Sunday color - true|false
$objCalendar->SetSundayColor(true);    
## *** set calendar caption
$objCalendar->SetCaption("ApPHP Calendar v".Calendar::Version());
 
## +-----------------------------------------------------------------------+
## | 7. Draw Calendar:                                                     |
## +-----------------------------------------------------------------------+
## *** drawing calendar
$objCalendar->Show();
 
?>