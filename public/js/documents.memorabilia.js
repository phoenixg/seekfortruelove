$(document).ready(function() {
    $.timeliner({
        timelineContainer: '#timelineContainer', // value: selector of the main element holding the timeline's content, default to #timelineContainer
        startState: 'open', // value: closed | open, default to closed; determines whether the timeline is initially collapsed or fully expanded
        startOpen: '', // value: selector ID of single timelineEvent, default to empty; determines the minor event that you want to display open by default on page load
        baseSpeed: 200, // value: any integer, default to 200; determines the base speed, some animations are a multiple (4x) of the base speed
        speed: 4, // value: numeric, defalut to 4; a multiplier applied to the base speed that sets the speed at which an event's conents are displayed and hidden
        fontOpen: '.6em', // value: any valid CSS font-size value, defaults to 1em; sets the font size of an event after it is opened
        fontClosed: '.6em', // value: any valid CSS font-size value, defaults to 1em; sets the font size of an event after it is closed
        expandAllText: '+ 展开全部', // value: string; defaults to '+ expand all'
        collapseAllText: '- 收缩全部' // value: string; defaults to '- collapse all'
    });
});
