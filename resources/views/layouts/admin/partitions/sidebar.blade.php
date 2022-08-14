<div class = "row">
     <div class="col-2 ">
        <div class="menu">
        <h2>
          <span>
          {{__('messages.system')}}
          </span>
        </h2>
        @can('view-permission-group')
          <a target="_top" href="{{ route('admin.user.index') }}">{{__('messages.user')}}</a>
          <a href="{{ route('admin.role.index') }}">{{__('messages.role')}}</a>
          <a href="{{ route('admin.permission.index') }}">{{__('messages.permission')}}</a>
          <a href="{{ route('admin.permission-group.index') }}">{{__('messages.permissionGroup')}}</a>
        @endcan
        <br>
        <h2>
          <span>
          {{__('messages.catalog')}}
          </span>
        </h2>
          <a target="_top" href="{{ route('admin.product.index') }}">{{__('messages.product')}}</a>
          <a href="{{ route('admin.category.index') }}">{{__('messages.category')}}</a>
        
        </div>
      
     </div>