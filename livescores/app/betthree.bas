B4A=true
Group=Default Group
ModulesStructureVersion=1
Type=Activity
Version=11
@EndOfDesignText@
#Region  Activity Attributes 
	#FullScreen: False
	#IncludeTitle: True
#End Region


Sub Process_Globals
	'These global variables will be declared once when the application starts.
	'These variables can be accessed from all modules.

End Sub

Sub Globals
	'These global variables will be redeclared each time the activity is created.
	'These variables can only be accessed from this module.

	Private web_browser As WebView
End Sub

Sub Activity_Create(FirstTime As Boolean)
	Activity.LoadLayout("betthree")
	Activity.Title = "Bet3ways"
	
	ProgressDialogShow2("Please wait...", True)
	web_browser.LoadUrl(Starter.bet3ways_url)
End Sub

Sub Activity_Resume

End Sub

Sub Activity_Pause (UserClosed As Boolean)

End Sub


Private Sub web_browser_PageFinished (Url As String)
	ProgressDialogHide
End Sub