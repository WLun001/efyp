<?php
namespace app\commands;
use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {

        $auth = Yii::$app->authManager;

        $manageStaff = $auth->createPermission('manageStaff');
        $manageStaff->description = 'Manage Staff';
        $auth->add($manageStaff);

        $manageStudents = $auth->createPermission('manageStudents');
        $manageStudents->description = 'Manage Students';
        $auth->add($manageStudents);

        $viewStudents = $auth->createPermission('viewStudents');
        $viewStudents->description = 'View Students';
        $auth->add($viewStudents);

        $manageTitle = $auth->createPermission('manageTitle');
        $manageTitle->description = 'Manage Title';
        $auth->add($manageTitle);

        $viewTitle = $auth->createPermission('viewTitle');
        $viewTitle->description = 'View Title';
        $auth->add($viewTitle);

        $allocateTitle = $auth->createPermission('allocateTitle');
        $auth->createPermission('allocateTitle');
        $allocateTitle->description = 'Allocate Title';
        $auth->add($allocateTitle);

        $manageAnnouncement = $auth->createPermission('manageAnnouncement');
        $manageAnnouncement->description = 'Manage Announcement';
        $auth->add($manageAnnouncement);

        $viewAnnouncement = $auth->createPermission('viewAnnouncement');
        $viewAnnouncement->description = 'View Announcement';
        $auth->add($viewAnnouncement);

        $manageCalendar = $auth->createPermission('manageCalendar');
        $manageCalendar->description = 'Manage Calendar';
        $auth->add($manageCalendar);

        $viewCalendar = $auth->createPermission('viewCalendar');
        $viewCalendar->description = 'View Calendar';
        $auth->add($viewCalendar);

        $manageGanttChart = $auth->createPermission('manageGanttChart');
        $manageCalendar->description = 'Manage GanttChart';
        $auth->add($manageGanttChart);

        $viewGanttChart = $auth->createPermission('viewGanttChart');
        $viewGanttChart->description = 'View GanttChart';
        $auth->add($viewGanttChart);

        $manageLogBook = $auth->createPermission('manageLogBook');
        $manageLogBook->description = 'Manage Log Book';
        $auth->add($manageLogBook);

        $viewLogBook = $auth->createPermission('viewLogBook');
        $viewLogBook->description = 'View Log Book';
        $auth->add($viewLogBook);

        $manageCourse = $auth->createPermission('manageCourse');
        $manageCourse->description = 'Manage Course';
        $auth->add($manageCourse);

        $manageDepartments = $auth->createPermission('manageDepartments');
        $manageDepartments->description = 'Manage Departments';
        $auth->add($manageDepartments);

        $manageDownloads = $auth->createPermission('manageDownloads');
        $manageDownloads->description = 'Manage Downloads';
        $auth->add($manageDownloads);

        $viewDownloads = $auth->createPermission('viewDownloads');
        $viewDownloads->description = 'View Downloads';
        $auth->add($viewDownloads);

        $manageFaculty = $auth->createPermission('manageFaculty');
        $manageFaculty->description = 'Manage Faculty';
        $auth->add($manageFaculty);

        $manageFypType = $auth->createPermission('manageFypType');
        $manageFypType->description = 'Manage FypType';
        $auth->add($manageFypType);

        $manageRoles = $auth->createPermission('manageRoles');
        $manageRoles->description = 'Manage Roles';
        $auth->add($manageRoles);

        $manageReport = $auth->createPermission('manageReport');
        $manageReport->description = 'Manage Report';
        $auth->add($manageManageReport);

        $viewStudents = $auth->createPermission('viewStudents');
        $viewStudents->description = 'View Students';
        $auth->add($manageViewStudents);


        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $manageStaff);
        $auth->addChild($admin, $manageStudents);
        $auth->addChild($admin, $manageDepartments);
        $auth->addChild($admin, $manageFaculty);
        $auth->addChild($admin, $manageFypType);
        $auth->addChild($admin, $manageRoles);

        $fypCoordinator = $auth->createRole('fypCoordinator');
        $auth->add($fypCoordinator);
        $auth->addChild($fypCoordinator, $manageTitle);
        $auth->addChild($fypCoordinator, $manageCalendar);
        $auth->addChild($fypCoordinator, $manageAnnouncement);
        $auth->addChild($fypCoordinator, $manageDownloads);
        $auth->addChild($fypCoordinator, $manageReport);

        $auth->addChild($admin,$fypCoordinator);
        
        $supervisor = $auth->createRole('supervisor');
        $auth->add($supervisor);
        $auth->addChild($supervisor,$viewLogBook);
        $auth->addChild($supervisor, $viewTitle);
        $auth->addChild($supervisor, $viewAnnouncement);
        $auth->addChild($supervisor, $viewCalendar);
        $auth->addChild($supervisor, $viewGanttChart);
        $auth->addChild($supervisor, $viewDownloads);
        $auth->addChild($supervisor, $viewStudents);
        $auth->addChild($supervisor, $allocateTitle);

        $students = $auth->createRole('students');
        $auth->add($students);
        $auth->addChild($students, $manageLogBook);
        $auth->addChild($students, $manageGanttChart);
        $auth->addChild($students, $viewTitle);
        $auth->addChild($students, $viewAnnouncement);
        $auth->addChild($students, $viewCalendar);
        $auth->addChild($students, $viewDownloads);

        $auth->assign($admin, 4);
        $auth->assign($fypCoordinator, 4);
        $auth->assign($supervisor, 14);
        $auth->assign($students, 16);
        $auth->assign($students, 17);
    }
}