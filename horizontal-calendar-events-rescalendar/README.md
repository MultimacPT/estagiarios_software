# RESCalendar - Simple jQuery Horizontal Calendar plugin

This is a very simple plugin that shows JSON data in an horizontal calendar.

# Dependencies:
- JQuery
- Moment




# Quick and dirty initialization:
	
1. Link to the rescalendar.css in the head of your html, and to the rescalendar.js file AFTER linking to jquery.

2. Put in your html a div with class "rescalendar" and an id attribute, like:
		
```
<div class="rescalendar" id="my_calendar"></div>
```

3. Initialize the plugin after JQuery, like this:

```
$('.rescalendar').rescalendar({
	...your options here (see below)
});
```


# How it works:

- When you initialize the plugin, inside the div.rescalendar you will have:
	
	- some wrappers to help with styling
	- buttons to move one day left or right, or by big jumps (15 day by default).
	- an input field containing the reference date, ie, the date in the middle of the calendar
	- a button to bring the calendar to today
	- a row of days, formatted with day of the week, day number, month name (localized with moment)
	- some rows displaying the data, with
		- class "hasEvent" if the data matches that day and row name
		- class "customClass" if informed in the data
		- title attribute in a link if informed in the data

- When clicking on the buttons, changing the date input field, or clicking on a day, the calendar will be repositioned around the new date.



# Options / Properties:

- Required:
	- id: used to have unique calendar objects. The wrapper div around the calendar will include this id for styling purposes. Default: 'rescalendar'
	- format: date formats used in the calendar. All the date properties in the data must have this same format. Valid formats as provided by moment.js. Default: 'YYYY-MM-DD'
	

- Optional:
	- jumpSize: number of days to move left or right when clicking the '.move_to_yesterday' and 'move_to_tomorrow' buttons: default: 15;
	- calSize: number of days to display in the calendar: default: 30 ( another day will be added to make the calendar symmetrical);
	- refDate: the date in which the calendar will be initialized. Default: current date
	- locale: moment.js localization code. Default: 'en'
	- disabledDays: array of dates. If a date is in this array, the class 'disabledDay' will be added. Default: []
	- disabledWeekDays: array of week day numbers, ranging from 0 (Sunday) to 6 (Saturday). If a date is in this array, the class 'disabledDay' will be added. Default: []
	- dataKeyField: the name to be displayed on the left of each data row. Every data item must have a name attribute, which musth math an equal dataKeyValue, so class can be added if they match. See examples for more information. Default: []
	- dataKeyValues: an array with the names to be shown as rows. Default: []
	- lang. An Object with translations, with 4 possible translations. Overwrite if needed:
```
{
    'init_error' : 'Error when initializing',
    'no_data_error': 'No data found',
    'no_ref_date'  : 'No refDate found',
    'today'   : 'Today'
}
```
    - data: an array of objects containing the data to be shown in the calendar. Example:
```	
[
    {
        id: 1, // not used
        name: 'item1', // must match a dataKeyField value, otherwise this data range wont be shown
        startDate: '2019-03-01', // same format as in the format required option
        endDate: '2019-03-03', // same format as in the format required option
        customClass: 'greenClass', // optional, class will be added to every data point in the calendar
        title: 'Title 1 en' // if provided, a link with href="#" and a target with this title will be added
    },
    {
        id: 2,
        name: 'item2',
        startDate: '2019-03-05',
        endDate: '2019-03-15',
        customClass: 'blueClass',
        title: 'Title 2 en'
    },
    {
        id: 3,
        name: 'item5',
        startDate: '2019-03-05',
        endDate: '2019-03-08',
        customClass: 'greenClass'
    }
]
```


# Other notes:

- You can instantiate several calendar objects on the same page. 
- You can instantiate all the calendars with the same data if you identify them with a common class.
- Check the index.html in the demo for more information
- To run the tests, install Cypress (npm install cypress), then run the tests like this: $(npm bin)/cypress open



