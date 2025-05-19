<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { 
  LayoutDashboard,
  Building,
  Hammer,
  HardHat,
  Calendar,
  FileText,
  Users,
  Settings,
  GanttChartSquare,
  Landmark,
  FileSearch,
  HelpCircle,
  Github,
  BookOpen
} from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';

const mainNavItems: NavItem[] = [
  {
    title: 'Dashboard',
    href: '/dashboard',
    icon: LayoutDashboard,
    active: route().current('dashboard')
  },
  {
    title: 'Projects',
    href: '/projects',
    icon: Building,
    active: route().current('projects.*'),
    badge: 12 // Active project count
  },
  {
    title: 'Tasks',
    href: '/tasks',
    icon: GanttChartSquare,
    active: route().current('tasks.*'),
    badge: 24 // Pending tasks
  },
  {
    title: 'Workers',
    href: '/workers',
    icon: HardHat,
    active: route().current('workers.*')
  },
  {
    title: 'Equipment',
    href: '/equipment',
    icon: Hammer,
    active: route().current('equipment.*')
  },
  {
    title: 'Clients',
    href: '/clients',
    icon: Users,
    active: route().current('clients.*')
  },
  {
    title: 'Schedule',
    href: '/schedule',
    icon: Calendar,
    active: route().current('schedule.*')
  },
  {
    title: 'Documents',
    href: '/documents',
    icon: FileText,
    active: route().current('documents.*')
  },
  {
    title: 'Budget',
    href: '/budget',
    icon: Landmark,
    active: route().current('budget.*')
  }
];

const secondaryNavItems: NavItem[] = [
  {
    title: 'Reports',
    href: '/reports',
    icon: FileSearch,
    active: route().current('reports.*')
  },
  {
    title: 'Settings',
    href: '/settings',
    icon: Settings,
    active: route().current('settings.*')
  }
];

const footerNavItems: NavItem[] = [
  {
    title: 'Documentation',
    href: 'https://docs.your-cpms.com',
    icon: BookOpen,
    external: true
  },
  {
    title: 'Help Center',
    href: '/help',
    icon: HelpCircle
  },
  {
    title: 'GitHub',
    href: 'https://github.com/your-repo',
    icon: Github,
    external: true
  }
];
</script>

<template>
  <Sidebar collapsible="icon" variant="inset" class="border-r border-gray-200 dark:border-gray-800">
    <SidebarHeader class="border-b border-gray-200 dark:border-gray-800">
      <SidebarMenu>
        <SidebarMenuItem>
          <SidebarMenuButton size="lg" as-child>
            <Link :href="route('dashboard')" class="flex items-center justify-center">
              <AppLogo class="h-8 w-auto" />
              <span class="ml-2 text-lg font-semibold whitespace-nowrap hidden lg:block">CPMS</span>
            </Link>
          </SidebarMenuButton>
        </SidebarMenuItem>
      </SidebarMenu>
    </SidebarHeader>

    <SidebarContent class="flex-1 overflow-y-auto">
      <div class="space-y-1 px-2 py-4">
        <NavMain :items="mainNavItems" />
      </div>
      
      <div class="border-t border-gray-200 dark:border-gray-800 px-2 py-4">
        <NavMain :items="secondaryNavItems" />
      </div>
    </SidebarContent>

    <SidebarFooter class="border-t border-gray-200 dark:border-gray-800">
      <div class="space-y-1 px-2 py-4">
        <NavFooter :items="footerNavItems" />
        <NavUser />
      </div>
    </SidebarFooter>
  </Sidebar>
  <slot />
</template>