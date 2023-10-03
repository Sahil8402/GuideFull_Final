// Options the user could type in
const prompts = [
    ["hi", "hey", "hello", "good morning", "good afternoon", "good evening", "hiii", "hiiii", "hiiiii", "hie"],
    ["what are you doing", "what's going on", "what's up"],
    ["how old are you"],
    ["who created you", "who made you"],
    [
        "your name please",
        "your name",
        "may i know your name",
        "what is your name",    
        "what do you call yourself","who are you",
    ],
    ["how can you help us", "how will you help us", "how can we get help", "i want new material", "can you provide us new materials"],
    ["i want help", "help me"],
    ["ah", "yes", "ok", "okay", "nice"],
    ["bye", "good bye", "goodbye", "see you later"],
    ["bro"],
    ["what", "why", "how", "where", "when"],
    ["no", "not sure", "maybe", "no thanks"],
    [""],
    ["haha", "ha", "lol", "hehe", "funny", "joke"],
    ["what materials does the website offer or specialize in"],
    ["how long will it take to upload other materials"],
    ["how can i score good marks in my exam"],
    ["tell me a joke"],
    ["how can i access study notes on guidefull"],
    ["how can i access study notes on GuideFull", "where can i find study materials", "study notes access"],
    ["tell me about note verification process", "how are notes verified", "verification of uploaded notes"],
    ["can i upload handwritten notes", "how to upload my own notes", "uploading personal study materials"],

    // Task Scheduler
    ["how to set a reminder for a task", "task scheduling with notifications", "setting up task reminders"],
    ["is there a limit to the number of tasks i can schedule", "maximum tasks in Task Scheduler", "task limit in scheduling"],
    ["can i prioritize tasks in Task Scheduler", "task prioritization", "organizing tasks by priority"],

    // Guidefull Jobs
    ["what types of jobs are listed on GuideFull", "job categories on GuideFull", "available job listings"],
    ["how can i create an impressive resume on GuideFull", "resume building on GuideFull", "creating a professional resume"],
    ["tell me more about internships on GuideFull", "internship opportunities", "internship listings on GuideFull"],

    // GuideFull Result Provider
    ["how often are exam results updated", "result update frequency", "exam result availability"],
    ["can i upload large study materials", "maximum file size for material uploads", "file size limit for uploads"],
    ["how do i upload study materials on GuideFull", "uploading study guides and materials", "materials submission process"],

    // GuideFull Notice Board
    ["what types of college notices are available", "notice categories on GuideFull", "college notice board"],
    ["can i subscribe to specific notice categories", "customizing notice subscriptions", "selective notice alerts"],
    ["tell me about the most recent college notice", "latest updates on Notice Board", "recent college announcements"]
]

// Possible responses, in corresponding order

const replies = [
    ["Hey,GBot here , How can I help you?"],
    [
        "Nothing much, I am Providing you Materials"

    ],
    ["I am infinite"],
    ["Parul university developer"],
    ["Gbot"],
    ["I will provide you Materials , if you want any other materials please do write in query section, so we'll help you"],
    ["What do you want please tell that in query"],
    ["Any materials or anything you want tell in query"],
    ["Bye", "Goodbye", "See you later"],
    ["Bro!"],
    ["Great question ,Anything you want to ask please write in query.."],
    ["That's ok", "I understand", "What do you want to talk about?"],
    ["Please say something"],
    ["Haha!", "Good one!"],
    ["We offer Materials of all subjects and if you don't get them in the materials section please do write in the query section and we'll look after your request."],
    ["Hopefully we will try to upload it as soon as possible after the materials get reviewed"],
    ["You should create a study plan first, understanding the syllabus, practicing regularly, Making notes on daily basis and being organized"],
    ["Sorry I don't think that's an appropriate question to ask"],
    ["You can find study notes in the 'Notes' section. Simply search for your desired subject or topic."],
    ["You can find study notes in the 'Notes' section. Simply search for your desired subject or topic."],
    ["The verification process typically takes a few hours to ensure the quality and accuracy of uploaded notes."],
    ["Yes, you can upload your handwritten notes, and they'll be verified for sharing with other students."],

    ["To set a reminder for a task, use the 'Task Scheduler' section and configure notifications with due dates and times."],
    ["There is no specific limit to the number of tasks you can schedule. Feel free to add as many as you need."],
    ["Yes, you can prioritize tasks in the Task Scheduler to organize them by importance."],

    ["GuideFull offers job listings from various industries. You can filter by location, job type, and more to find the right job for you."],
    ["You can create a professional resume using our 'Resume Builder' tool. Just input your details, and it will generate a polished resume."],
    ["Certainly! We also list internship opportunities to help students gain valuable work experience."],

    ["Exam results are typically updated regularly in the 'Results' section. Make sure to check for updates on the specified date."],
    ["You can upload study materials up to 100MB in size to share with other students."],
    ["To upload study materials, visit the 'Upload Materials' section and provide a clear description along with the file."],

    ["You can find various college notices on GuideFull. Stay informed about important announcements and updates."],
    ["Yes, you can customize your notice subscriptions to receive alerts for specific categories that interest you."],
    ["The most recent college notice can be found in the 'Notice Board' section. Stay updated with the latest announcements."]

    
]

// Random for any other user input

const alternative = [
    "I don't understand , I am still learning Gbot"
]

// Whatever else you want :)

const coronavirus = ["Please stay home", "Wear a mask", "Fortunately, I don't have COVID", "These are uncertain times"] 