
<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @if(!auth()->user()->isCustomer())
                <li>
                    <a href="{{route('sales-order.index')}}"><i class="menu-icon fa fa-file"></i>Sales Order</a>
                </li>
                @endif
                @if(auth()->user()->isAdmin())
                <li>
                    <a href="{{route('company.index')}}"><i class="menu-icon fa fa-address-card-o"></i>Company</a>
                </li>
                <li>
                    <a href="{{route('customer.index')}}"><i class="menu-icon fa fa-users"></i>Customer</a>
                </li>
                @endif
                <li>
                    <a href="{{route('job.index')}}"><i class="menu-icon fa fa-cogs"></i>Job</a>
                </li>
                @if(auth()->user()->isAdmin() || auth()->user()->isCustomer())
                <li>
                    <a href="{{route('event.create')}}"><i class="menu-icon fa fa-hourglass-end"></i>Event</a>
                </li>
                <li>
                    <a href="{{route('job-revenue.index')}}"><i class="menu-icon fa fa-line-chart"></i>Job Revenue Manager</a>
                </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
